<?php

namespace App\Http\Controllers\SchoolPrinting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Campus;
use App\Models\ClassSection;
use Carbon\Carbon;
use App\Utils\Util;
use Yajra\DataTables\Facades\DataTables;
use DB;
use PDF;
use File;
use App\Utils\FeeTransactionUtil;

class StudentPrintController extends Controller
{
    /**
    * Constructor
    *
    * @param NotificationUtil $notificationUtil
    * @return void
    */
    public function __construct(Util $util, FeeTransactionUtil $feeTransactionUtil)
    {
        $this->util= $util;
        $this->feeTransactionUtil = $feeTransactionUtil;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('print.student_particular')) {
            abort(403, 'Unauthorized action.');
        }
        // dd(Carbon::now()->format("l") );
        // dd($this->util->generateDateRange(Carbon::parse('2022-02-01'), Carbon::parse('2022-02-28')));

        $campuses=Campus::forDropdown();

        return view('tenant.school-printing.student-print.index')->with(compact('campuses'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('print.student_particular')) {
            abort(403, 'Unauthorized action.');
        }
        // try {
        if (File::exists(public_path('uploads/pdf/hrm.pdf'))) {
            File::delete(public_path('uploads/pdf/hrm.pdf'));
        }
        $check_transport=false;
        $pdf_name='hrm'.'.pdf';
        $input = $request->input();

        $_date=explode(' - ', $input['month_list_filter_date_range']);
        $start_date=Carbon::parse($_date[0])->format('Y-m-d');
        $end_date=Carbon::parse($_date[1])->format('Y-m-d');
        $campus_id=$input['campus_id'];
        if (!empty($request->input('class_ids'))) {
            $class_section=ClassSection::whereIn('class_id', $input['class_ids'])->where('campus_id', $campus_id)->orderBy('class_id', 'asc')->get();
        } else {
            $class_section=ClassSection::orderBy('class_id', 'asc')->where('campus_id', $campus_id)->get();
        }
        $student_list=[];

        foreach ($class_section as $section) {
            $students =Student::with(['campuses','current_class','current_class_section'])
    ->leftjoin('fee_transactions AS t', 'students.id', '=', 't.student_id')
    ->where('students.current_class_section_id', $section->id)
    ->where('students.status', $input['status'])
    ->select([
             'students.*',
             DB::raw("COALESCE(SUM(IF(t.type = 'fee' AND t.status = 'final', final_total, 0)),0)-COALESCE(SUM(IF(t.type = 'fee' AND t.status = 'final', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
        +COALESCE(SUM(IF(t.type = 'opening_balance', final_total, 0)),0) -COALESCE(SUM(IF(t.type = 'opening_balance', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
        +COALESCE(SUM(IF(t.type = 'admission_fee', final_total, 0)),0) -COALESCE(SUM(IF(t.type = 'admission_fee', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
        +COALESCE(SUM(IF(t.type = 'other_fee', final_total, 0)),0) -COALESCE(SUM(IF(t.type = 'other_fee', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
        +COALESCE(SUM(IF(t.type = 'transport_fee', final_total, 0)),0) -COALESCE(SUM(IF(t.type = 'transport_fee', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0) as total_due"),
        DB::raw("COALESCE(SUM(IF(t.type = 'fee' AND t.status = 'final', final_total, 0)),0)-COALESCE(SUM(IF(t.type = 'fee' AND t.status = 'final', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
   +COALESCE(SUM(IF(t.type = 'opening_balance', final_total, 0)),0) -COALESCE(SUM(IF(t.type = 'opening_balance', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
   +COALESCE(SUM(IF(t.type = 'admission_fee', final_total, 0)),0) -COALESCE(SUM(IF(t.type = 'admission_fee', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
   +COALESCE(SUM(IF(t.type = 'other_fee', final_total, 0)),0) -COALESCE(SUM(IF(t.type = 'other_fee', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
    as total_fee_due"),
        DB::raw("COALESCE(SUM(IF(t.type = 'transport_fee' AND t.status = 'final', final_total, 0)),0)-COALESCE(SUM(IF(t.type = 'transport_fee' AND t.status = 'final', (SELECT SUM(IF(is_return = 1,-1*amount,amount)) FROM fee_transaction_payments WHERE fee_transaction_payments.fee_transaction_id=t.id), 0)),0)
    as total_transport_fee_due"),
    ])->groupBy('students.id');
    
            if (request()->has('only_transport')) {
                $check_transport=true;
                  if ($input['only_transport']==1) {
                    $students->Where('student_transport_fee', '>', 0);
                    ;
                }
            }
            $students=$students->get();
            if (!$students->isEmpty()) {
                $section_list=[];
                foreach ($students as $std) {
                    if (request()->has('only_paid')) {
                        if ($this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)>0) {
                            $section_list[]=[
                                'campus_name'=>$std->campuses->campus_name,
                                'class_name'=>$std->current_class->title,
                                'section_name'=>$std->current_class_section->section_name,
                                'roll_no'=>$std->roll_no,
                                'student_name'=>$std->first_name . $std->last_name,
                                'father_name'=>$std->father_name,
                                'birth_date'=>$std->birth_date,
                                 'mobile_no'=>$std->mobile_no ,
                                 'father_cnic_no'=>$std->father_cnic_no,
                                 'std_permanent_address'=>$std->std_permanent_address,
                                 'student_tuition_fee'=>$std->student_tuition_fee,
                                'student_transport_fee'=>$std->student_transport_fee,
                                'total_due'=>$std->total_due,
                                'total_fee_due'=>$std->total_fee_due,
                                'total_transport_fee_due'=>$std->total_transport_fee_due,
                                'paid'=>$this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)

                            ];
                        }
                    } elseif (request()->has('only_unpaid')) {
                        if ($this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)==0) {
                            if (!empty($input['due_limit'])) {
                                if ($std->total_due>=$input['due_limit'] && $std->total_due!=0) {

                                    $section_list[]=[
                                        'campus_name'=>$std->campuses->campus_name,
                                        'class_name'=>$std->current_class->title,
                                        'section_name'=>$std->current_class_section->section_name,
                                        'roll_no'=>$std->roll_no,
                                        'student_name'=>$std->first_name . $std->last_name,
                                        'father_name'=>$std->father_name,
                                        'birth_date'=>$std->birth_date,
                                         'mobile_no'=>$std->mobile_no ,
                                         'father_cnic_no'=>$std->father_cnic_no,
                                         'std_permanent_address'=>$std->std_permanent_address,
                                         'student_tuition_fee'=>$std->student_tuition_fee,
                                        'student_transport_fee'=>$std->student_transport_fee,
                                        'total_due'=>$std->total_due,
                                        'total_fee_due'=>$std->total_fee_due,
                                        'total_transport_fee_due'=>$std->total_transport_fee_due,
                                        'paid'=>$this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)

                                    ];
                                }
                            }else{
if ($std->total_due!=0) {
   // dd($check_transport);
     if($check_transport==true){
        if($std->total_transport_fee_due>0){
    $section_list[]=[
        'campus_name'=>$std->campuses->campus_name,
        'class_name'=>$std->current_class->title,
        'section_name'=>$std->current_class_section->section_name,
        'roll_no'=>$std->roll_no,
        'student_name'=>$std->first_name . $std->last_name,
        'father_name'=>$std->father_name,
        'birth_date'=>$std->birth_date,
         'mobile_no'=>$std->mobile_no ,
         'father_cnic_no'=>$std->father_cnic_no,
         'std_permanent_address'=>$std->std_permanent_address,
         'student_tuition_fee'=>$std->student_tuition_fee,
        'student_transport_fee'=>$std->student_transport_fee,
        'total_due'=>$std->total_due,
        'total_fee_due'=>$std->total_fee_due,
        'total_transport_fee_due'=>$std->total_transport_fee_due,
        'paid'=>$this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)

    ];
}
}else{
    $section_list[]=[
        'campus_name'=>$std->campuses->campus_name,
        'class_name'=>$std->current_class->title,
        'section_name'=>$std->current_class_section->section_name,
        'roll_no'=>$std->roll_no,
        'student_name'=>$std->first_name . $std->last_name,
        'father_name'=>$std->father_name,
        'birth_date'=>$std->birth_date,
         'mobile_no'=>$std->mobile_no ,
         'father_cnic_no'=>$std->father_cnic_no,
         'std_permanent_address'=>$std->std_permanent_address,
         'student_tuition_fee'=>$std->student_tuition_fee,
        'student_transport_fee'=>$std->student_transport_fee,
        'total_due'=>$std->total_due,
        'total_fee_due'=>$std->total_fee_due,
        'total_transport_fee_due'=>$std->total_transport_fee_due,
        'paid'=>$this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)

    ]; 
}
}
                            }
                        }
                    }else{
if (request()->has('net_dues')) {
if ($std->total_due!=0) {
    $section_list[]=[
        'campus_name'=>$std->campuses->campus_name,
        'class_name'=>$std->current_class->title,
        'section_name'=>$std->current_class_section->section_name,
        'roll_no'=>$std->roll_no,
        'student_name'=>$std->first_name . $std->last_name,
        'father_name'=>$std->father_name,
        'birth_date'=>$std->birth_date,
         'mobile_no'=>$std->mobile_no ,
         'father_cnic_no'=>$std->father_cnic_no,
         'std_permanent_address'=>$std->std_permanent_address,
         'student_tuition_fee'=>$std->student_tuition_fee,
        'student_transport_fee'=>$std->student_transport_fee,
        'total_due'=>$std->total_due,
        'total_fee_due'=>$std->total_fee_due,
        'total_transport_fee_due'=>$std->total_transport_fee_due,
        'paid'=>$this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)

    ];
}
}else{
    $section_list[]=[
        'campus_name'=>$std->campuses->campus_name,
        'class_name'=>$std->current_class->title,
        'section_name'=>$std->current_class_section->section_name,
        'roll_no'=>$std->roll_no,
        'student_name'=>$std->first_name . $std->last_name,
        'father_name'=>$std->father_name,
        'birth_date'=>$std->birth_date,
         'mobile_no'=>$std->mobile_no ,
         'father_cnic_no'=>$std->father_cnic_no,
         'std_permanent_address'=>$std->std_permanent_address,
         'student_tuition_fee'=>$std->student_tuition_fee,
        'student_transport_fee'=>$std->student_transport_fee,
        'total_due'=>$std->total_due,
        'total_fee_due'=>$std->total_fee_due,
        'total_transport_fee_due'=>$std->total_transport_fee_due,
        'paid'=>$this->feeTransactionUtil->getTotalFeePaid($start_date, $end_date, $std->id)

    ];
}
                    }
                    ///
                }
                if (!empty($section_list)) {
                    $student_list[]=$section_list;
                }
            }
        }
        //dd($student_list);
        $pdf =  config('constants.mpdf');
        if ($pdf) {
         $this->reportPDF('samplereport.css', $student_list, 'MPDF.student-particular', 'view', 'a4');
         } else {
            $snappy  = \WPDF::loadview('tenant.school-printing.student-print.student_particular', compact('student_list'));
            $headerHtml = view()->make('common._header')->render();
            $footerHtml = view()->make('common._footer')->render();
            $snappy->setOption('header-html', $headerHtml);
            $snappy->setOption('footer-html', $footerHtml);
            $snappy->setPaper('a4')->setOption('orientation', 'portrait')->setOption('footer-right', 'Page [page] of [toPage]')->setOption('margin-top', 20)->setOption('margin-left', 5)->setOption('margin-right', 5)->setOption('margin-bottom', 5);
            $snappy->save('tenant/uploads/pdf/'.$pdf_name);//save pdf file
            return $snappy->stream();
        }
    }

   
}
