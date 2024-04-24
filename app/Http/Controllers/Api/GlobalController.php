<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Classes;
use App\Models\Curriculum\ClassSubject;
use App\Models\Curriculum\SubjectChapter;
use App\Models\Curriculum\SubjectQuestionBank;
use App\Models\Tenant;
use App\Notifications\SendMessageToSubscriber;
use Illuminate\Http\Request;
use DB;
use App\Models\Subscription;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Utils\NotificationUtil;
use App\Utils\FeeTransactionUtil;
use App\Utils\StudentUtil;
class GlobalController extends Controller
{
    protected $feeTransactionUtil;
    protected $notificationUtil;
    protected $studentUtil;

    /**
    * Constructor
    *
    * @return void
    */
    public function __construct(FeeTransactionUtil $feeTransactionUtil, NotificationUtil $notificationUtil, StudentUtil $studentUtil)
    {
        $this->feeTransactionUtil = $feeTransactionUtil;
        $this->notificationUtil= $notificationUtil;
        $this->studentUtil= $studentUtil;
    }
    public function get_campus()
    {

        $campuses = Campus::get();
        //dd($campuses);

        return response()->json($campuses);
    }

    public function get_class($id)
    {

        $classes = Classes::where('campus_id', $id)->get();
        //dd($classes);

        return response()->json($classes);
    }
    public function get_subject($id)
    {

        $subjects = ClassSubject::where('class_id', $id)->get();
        return response()->json($subjects);
    }
    public function get_chapter($id)
    {

        $chapters = SubjectChapter::where('subject_id', $id)->get();
        return response()->json($chapters);
    }

    public function postQuestion(Request $request)
    {
        try {
            $data = explode('()', $request->input('question_data'));
            DB::beginTransaction();

            if ($request->input('type') == 'mcq') {
                foreach ($data as $key => $value) {
                    if (!empty($value)) {
                        $question = SubjectQuestionBank::where('question', $value)->first();
                        if (empty($question)) {
                            $mcq = explode('$mcq', $value);
                            $options = $mcq[1];
                            $new_options = [];
                            $option = explode('mcqo', $options);
                            foreach ($option as $option) {
                                if (!empty($option) && $option != " ") {
                                    $new_options[] = $option;
                                }
                            }
                            if (count($new_options) > 3) {
                                $sim_insert = [
                                    'subject_id' => $request->input('subject_id'),
                                    'chapter_id' => $request->input('chapter_id'),
                                    'type' => $request->input('type'),
                                    'question' => $mcq[0],
                                    'option_a' => $new_options[0],
                                    'option_b' => $new_options[1],
                                    'option_c' => $new_options[2],
                                    'option_d' => $new_options[3],

                                ];
                                $questions = SubjectQuestionBank::create($sim_insert);
                            }
                        }
                    }
                }
                    $output = ['success' => true,
                'msg' => __("english.add_success"),
            ];
                
            } else {
                foreach ($data as $key => $value) {
                    if (!empty($value)) {
                        $question = SubjectQuestionBank::where('question', $value)->first();
                        if (empty($question)) {
                            $sim_insert = [
                                'subject_id' => $request->input('subject_id'),
                                'chapter_id' => $request->input('chapter_id'),
                                'type' => $request->input('type'),
                                'question' => $value,
                            ];
                            $questions = SubjectQuestionBank::create($sim_insert);
                        }
                    }
                }
                $output = ['success' => true,
                'msg' => __("english.add_success"),
            ];
            }
            DB::commit();
 
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

            $output = ['success' => false,
                'msg' => __("english.something_went_wrong"),
            ];
        }

        return response($output);
    }

    public function postChapter(Request $request)
    {
        try {
            $data = explode('()', $request->input('question_data'));
            foreach ($data as $key => $value) {
                if (!empty($value)) {
                    $chapter = SubjectChapter::where('chapter_name', $value)->first();
                    if (empty($chapter)) {
                        $sim_insert = [
                            'subject_id' => $request->input('subject_id'),
                            'chapter_name' => $value,
                        ];
                        $chapters = SubjectChapter::create($sim_insert);
                    }
                }

            }
            $output = ['success' => true,
                'msg' => __("english.add_success"),
            ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

            $output = ['success' => false,
                'msg' => __("english.something_went_wrong"),
            ];
        }

        return response($output);
    }
    function payTabSuccessful(Request $request)
    {
        //dd($request);
    return redirect('/');
        // dd($request);
        // return view('saas.payment_successful');

        
    }
    function AfterPayTabSuccessfulCreateTenant(Request $request)
    {
        $inputData = $request->input();

        $subscription=Subscription::with(['created_user'])->findOrFail($request->input('cart_id'));
        $subscription->paid_via="PayTabs";
        $subscription->status="approved";
        $subscription->package_details=json_encode($inputData);
        $subdomain = $subscription->created_user->username;
        $subscription->save();
        //$tenant = Tenant::where('id',$subdomain)->first();
        
       $tenant = Tenant::create(['id' => $subdomain, 'tenancy_db_name' => $subdomain]);
        DB::table('tenants')->where('id', $tenant->id)->update(['user_id' => $subscription->created_user->id, 'unique_key' => Hash::make(Str::random(32))]);
        $tenant->domains()->create(['domain' => $subdomain . '.' . 'jezdan.co']);
    
        $yourPath = storage_path('tenant' . $subdomain);
        // Check if the directory already exists
        if (!File::exists($yourPath)) {
            // If not, create it
            File::makeDirectory($yourPath, 0755, true, true);
        }
        $yourPath = storage_path('tenant' . $subdomain . '/app/pdf');
    
        if (!File::exists($yourPath)) {
            // If not, create it
            File::makeDirectory($yourPath, 0755, true, true);
        }
    
        Artisan::call('tenants:seed', [
            '--tenants' => $subdomain,
            '--force' => true,
        ]);

        \Illuminate\Support\Facades\Mail::to($subscription->created_user->email)->send(new SendMessageToSubscriber($subscription->created_user,$tenant));

        return true;
    }
    function FeePayTabSuccessful(Request $request)
    {
        $student_id = $request->input('cart_id');
        //dd(444);
        try {
          DB::beginTransaction();
          $inputData = $request->input();
          
   
    $data =[
     
        "amount" => $request->input('cart_amount'),
        "method" => "payTabs",
        "discount_amount" => "00",
        "note" => json_encode($inputData),
        "card_number" => null,
        "card_holder_name" => null,
        "card_transaction_number" => null,
        "card_type" => "credit",
        "card_month" => null,
        "card_year" => null,
        "card_security" => null,
        "cheque_number" => null,
        "bank_account_number" => null,
    ];
            $parent_payment=$this->feeTransactionUtil->OnlinePayStudent($student_id,1,$data);

            DB::commit();
    
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
            $output = ['success' => false,
                          'msg' => "File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage()
                      ];
        }

        //\Illuminate\Support\Facades\Mail::to($subscription->created_user->email)->send(new SendMessageToSubscriber($subscription->created_user,$tenant));

        return true;
    }
    
}
