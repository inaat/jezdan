<?php

namespace App\Http\Controllers\GuardianLayout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum\ClassSubject;
use App\Models\Curriculum\SubjectTeacher;
use App\Models\Curriculum\ClassTimeTable;
use App\Models\Campus;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Session;
use App\Models\StudentGuardian;
use App\Models\Exam\ExamCreate;
use App\Models\Exam\ExamAllocation;
use App\Models\Exam\ExamDateSheet;
use App\Models\Exam\ExamSubjectResult;
use App\Models\Exam\ExamGrade;
use App\Models\Curriculum\SubjectChapter;
use Illuminate\Support\Facades\Validator;
use DB;
use File;

use App\Models\ClassSection;
use App\Models\FeeTransaction;
use App\Models\Discount;
use App\Models\FeeHead;
use App\Models\FeeTransactionPayment;
use App\Models\FeeTransactionLine;
use Yajra\DataTables\Facades\DataTables;
use App\Utils\StudentUtil;
use App\Utils\FeeTransactionUtil;
use App\Utils\NotificationUtil;
use App\Events\FeeTransactionPaymentDeleted;


use Paytabscom\Laravel_paytabs\Facades\paypage;
use App\Models\User;
use App\Models\Global\Country;
use App\Models\Global\State;
use App\Models\Global\City;
class GuardianDashboardController extends Controller
{
    protected $studentUtil;
    protected $feeTransactionUtil;
    protected $notificationUtil;


    /**
     * Constructor
     *
     * @param ModuleUtil $moduleUtil
     * @return void
     */
    public function __construct(StudentUtil $studentUtil, FeeTransactionUtil $feeTransactionUtil, NotificationUtil $notificationUtil)
    {
        $this->studentUtil = $studentUtil;
        $this->feeTransactionUtil = $feeTransactionUtil;
        $this->notificationUtil = $notificationUtil;
        $this->student_status_colors = [
            'active' => 'bg-success',
            'packed' => 'bg-info',
            'shipped' => 'bg-navy',
            'delivered' => 'bg-green',
            'cancelled' => 'bg-red',
        ];
    }
    public function index()
    {
        $user = \Auth::user();
        if ($user->user_type == 'guardian') {
            $child=StudentGuardian::with(['student_guardian','students'])->where('guardian_id', $user->hook_id)->get();
            return view('tenant.guardian_layouts.guardian_dashboard.index')->with(compact('child'));
        } else {
            return redirect('/dashboard');
        }
        
    } 

    public function feePayWithPayTab($student_id,$amount){
      

       $student = Student::findOrFail($student_id);
          $clientIP = request()->ip();
          $pay= paypage::sendPaymentCode('all')
          ->sendTransaction('sale','ecom')
          ->sendCart( $student_id ,$amount,$student->first_name . ' '. $student->last_name)
         
          ->sendCustomerDetails($student->first_name . ' '. $student->last_name, $student->email, $student->phone, $student ->address, 'Barkhan','BA', "PK", '1234',$clientIP)
          ->sendShippingDetails($student->first_name . ' '. $student ->last_name, $student->email, $student->phone, $student->address, 'Barkhan', 'BA',"PK", '123',$clientIP)
          ->sendURLs(null,url('/').'/api/PayTab/fee/callback')
          ->sendLanguage('en')
          ->create_pay_page();
        //  dd($pay);
           return $pay;
    }
    public function getTransaction($student_id){
        if (request()->ajax()) {
            $fee_transactions = FeeTransaction::leftJoin('students', 'fee_transactions.student_id', '=', 'students.id')

            ->leftJoin('users as u', 'fee_transactions.created_by', '=', 'u.id')
            ->leftJoin('classes as c-class', 'students.current_class_id', '=', 'c-class.id')
            ->leftJoin('classes as t-class', 'fee_transactions.class_id', '=', 't-class.id')
            ->leftJoin('sessions', 'fee_transactions.session_id', '=', 'sessions.id')
            ->join(
                'campuses AS campus',
                'fee_transactions.campus_id',
                '=',
                'campus.id'
            )
            ->where('fee_transactions.student_id', $student_id)
            ->where('fee_transactions.status', 'final')
            ->select(
                'fee_transactions.id',
                'fee_transactions.transaction_date',
                'fee_transactions.month',
                'fee_transactions.type',
                'fee_transactions.voucher_no',
                'fee_transactions.payment_status',
                'fee_transactions.before_discount_total',
               'fee_transactions.discount_amount',
                'fee_transactions.final_total',
                'c-class.title as current_class',
                't-class.title as transaction_class',
                'students.father_name',
                'students.roll_no as roll_no',
                'students.status',
                DB::raw("concat(sessions.title, ' - ' '(', sessions.status, ') ') as session_info"),
                DB::raw("CONCAT(COALESCE(students.first_name, ''),' ',COALESCE(students.last_name,'')) as student_name"),
                // DB::raw('DATE_FORMAT(fee_transactions.transaction_date, "%Y/%m/%d") as transaction_date'),
                DB::raw("CONCAT(COALESCE(u.surname, ''),' ',COALESCE(u.first_name, ''),' ',COALESCE(u.last_name,'')) as added_by"),
                DB::raw('(SELECT SUM(IF(TP.is_return = 1,-1*TP.amount,TP.amount)) FROM fee_transaction_payments AS TP WHERE
                    TP.fee_transaction_id=fee_transactions.id) as total_paid'),
                'campus.campus_name as campus_name',
            )->orderBy('fee_transactions.transaction_date', 'desc');     

            if (request()->has('payment_status')) {
                $payment_status = request()->get('payment_status');
                if (!empty($payment_status)) {
                    $fee_transactions->where('fee_transactions.payment_status', $payment_status);
                }
            }
            if (request()->has('transaction_type')) {
                $transaction_type = request()->get('transaction_type');
                if (!empty($transaction_type)) {
                    $fee_transactions->where('fee_transactions.type', $transaction_type);
                }
            }
            if (!empty(request()->start_date) && !empty(request()->end_date)) {
                $start = request()->start_date;
                $end = request()->end_date;
                $fee_transactions->whereDate('fee_transactions..transaction_date', '>=', $start)
                    ->whereDate('fee_transactions..transaction_date', '<=', $end);
            }

            $datatable = Datatables::of($fee_transactions)
                ->addColumn(
                    'action',
                    function ($row) {
                        $html = '<div class="dropdown">
                     <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">' . __("english.actions") . '</button>
                     <ul class="dropdown-menu" style="">';
                        if (auth()->user()->can('print.challan_print')) {
                            $html .= '<li><a class="dropdown-item print-invoice " href="#" data-href="' . action('SchoolPrinting\FeeCardPrintController@singlePrint', [$row->id]) . '"><i class="fas fa-print"></i> ' . __("english.challan_print") . '</a></li>';
                        }
                        if (auth()->user()->can('fee.add_fee_payment')) {
                            $html .= '<li><a href="' . action('FeeTransactionPaymentController@addPayment', [$row->id]) . '" class="dropdown-item add_payment_modal"><i class="fas fa-money-bill-alt"></i> ' . __("english.add_payment") . '</a></li>';
                        }if (auth()->user()->can('fee.fee_payment_view')) {
                            $html .= '<li><a href="' . action('FeeTransactionPaymentController@show', [$row->id]) . '" class="dropdown-item view_payment_modal"><i class="fas fa-eye"></i> ' . __("english.view_payments") . '</a></li>';
                        }
                        if (auth()->user()->can('fee.fee_transaction_delete')) {
                            if ($row->payment_status == "due") {
                                $html .= '<li>
                <a href="' . action('FeeAllocationController@destroy', [$row->id]) . '" class="dropdown-item delete-fee_transaction"><i class="fas fa-trash"></i>' . __("english.delete") . '</a>
                </li>';
                            }
                        }
                        $html .= '</ul></div>';

                        return $html;
                    }
                )
                ->editColumn(
                    'payment_status',
                    function ($row) {
                        $payment_status = FeeTransaction::getPaymentStatus($row);
                        return (string) view('tenant.fee_allocation.partials.payment_status', ['payment_status' => $payment_status, 'id' => $row->id]);
                    }
                )
                ->editColumn('student_name', function ($row) {
                    return ucwords($row->student_name);
                })
                ->editColumn('month', function ($row) {
                    $html = __('english.months.' . $row->month) . '  - ';
                    $html .= '<span class="badge text-white text-uppercase  bg-primary">';
                    $html .= __('english.transaction_types.' . $row->type) . '</span>';
                    return $html;

                })
                ->editColumn('father_name', function ($row) {
                    return ucwords($row->father_name);
                })
                ->editColumn('roll_no', function ($row) {
                    return ucwords($row->roll_no);
                })
                ->editColumn('type', function ($row) {
                    return ucwords(str_replace('_', ' ', $row->type));
                })
                ->editColumn('current_class', function ($row) {
                    return ucwords($row->current_class);
                })
                //    ->editColumn('status', function ($row) {
                //        $status_color = !empty($this->student_status_colors[$row->status]) ? $this->student_status_colors[$row->status] : 'bg-gray';
                //        $status='<span class="badge badge-mark ' . $status_color .'">' .ucwords($row->status).   '</span>';
                //        return $status;
                //    })
                ->addColumn('total_remaining', function ($row) {
                    $total_remaining = $row->final_total - $row->total_paid;
                    $total_remaining_html = '<span class="payment_due" data-orig-value="' . $total_remaining . '">' . $this->feeTransactionUtil->num_f($total_remaining, true) . '</span>';


                    return $total_remaining_html;
                })
                ->editColumn(
                    'total_paid',
                    '<span class="total-paid" data-orig-value="{{$total_paid}}">@format_currency($total_paid)</span>'
                )
                ->editColumn(
                    'final_total',
                    '<span class="final-total" data-orig-value="{{$final_total}}">@format_currency($final_total)</span>'
                )
                ->editColumn(
                    'before_discount_total',
                    '<span class="before_discount_total" data-orig-value="{{$before_discount_total}}">@format_currency($before_discount_total)</span>'
                )
                ->editColumn(
                    'discount_amount',
                    '<span class="discount_amount" data-orig-value="{{$discount_amount}}">@format_currency($discount_amount)</span>'
                )
                ->editColumn('transaction_date', '{{@format_date($transaction_date)}}')
                ->filterColumn('roll_no', function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('students.roll_no', 'like', "%{$keyword}%");
                    });
                })
                ->filterColumn('student_name', function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('students.first_name', 'like', "%{$keyword}%");
                    });
                })
                ->filterColumn('father_name', function ($query, $keyword) {
                    $query->where(function ($q) use ($keyword) {
                        $q->where('students.father_name', 'like', "%{$keyword}%");
                    });
                })
                ->removeColumn('id');



            $rawColumns = [
                'action',
                //'status',
                'campus_name',
                'transaction_class',
                'transaction_date',
                'voucher_no',
                'payment_status',
                'before_discount_total',
                'discount_amount',
                'final_total',
                'total_remaining',
                'total_paid',
                'roll_no',
                'month'
            ];

            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
$student = Student::findOrFail($student_id);
$total_dues=$this->studentUtil->getStudentDue($student_id);

return view('tenant.guardian_layouts.guardian_dashboard.fee')->with(compact('student','total_dues'));


    }
}
