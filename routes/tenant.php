<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\WhatsappDeviceController;
/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
{
    "created_at": "2024-02-27 17:32:45",
    "updated_at": "2024-02-27 17:32:45",
    "tenancy_db_name": "abasyn",
    'tenancy_db_username' => 'abasyn',
    'tenancy_db_password' => 'Y*L35EGdD(g+111111'
}
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

// Route::middleware([
//     'web',
//     InitializeTenancyByDomain::class,
//     PreventAccessFromCentralDomains::class,
// ])->group(function () {
//     Route::get('/', function () {
//         return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
//     });
// });

Route::middleware([
    'web',
    \App\Http\Middleware\Tenant\InitializeTenancyByDomainCustomisedMiddleware::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
    Route::get('/get_provinces', 'ProvinceController@getProvinces');
Route::get('/get_districts', 'DistrictController@getDistricts');
Route::get('/get_cities', 'CityController@getCities');
Route::get('/get_regions', 'RegionController@getRegions');
Route::get('/classes/get_campus_classes', 'ClassController@getCampusClass');

Route::middleware(['auth','SetSessionData','timezone','AdminSidebarMenu','FrontSessionData'])->group(function () {
    Route::resource('session', 'SessionController');
    Route::put('session/activate-session/{id}', 'SessionController@activateSession');
    Route::post('student/update-status', 'StudentController@updateStatus');
    Route::get('/sessions/get_roll_no', 'SessionController@getRollNo');
    
    Route::get('/classes/get_class_fee', 'ClassController@getClassFee');
    Route::get('/classes/get_class_section', 'ClassController@getClassSection');
  
    Route::get('/get_regions_transport_fee', 'RegionController@getRegionTransportFee');

    Route::get('/add_sibling', 'StudentController@addSibling');
    Route::get('/add_admission_fee/{id}', 'StudentController@addAdmissionFee');
    Route::post('/post_admission_fee', 'StudentController@postAdmissionFee');

    Route::get('student/getByClassAndSection', 'StudentController@getByClassAndSection');
    Route::get('student/getStudentRecordByID', 'StudentController@getStudentRecordByID');
    Route::get('/payments/pay-student-due/{student_id}', 'FeeTransactionPaymentController@getPayStudentDue');
    Route::post('/payments/pay-student-due', 'FeeTransactionPaymentController@postPayStudentDue');
    Route::get('/payments/add_payment/{transaction_id}', 'FeeTransactionPaymentController@addPayment');
    Route::get('/payments/add_student_advance_amount_payment/{student_id}', 'FeeTransactionPaymentController@addStudentAdvanceAmountPayment');
    Route::post('/payments/post_advance_amount_payment', 'FeeTransactionPaymentController@postAdvanceAmount');
    //bulk 
    Route::get('students/bulk-edit', 'StudentController@bulkEdit');
    Route::post('students/get-bulk-edit', 'StudentController@getBulkEdit');
    Route::post('students/post-bulk-edit', 'StudentController@postBulkEdit');

    ///Search Students
    Route::get('/student/list', 'StudentController@getStudents');
    Route::post('/payments/fee-receipt-student-due', 'FeeTransactionPaymentController@feeReceiptPayStudentDue');
    Route::get('/student/documents', 'StudentController@get_documents');
    Route::get('/student/assessments', 'StudentController@get_assessments');
    Route::get('/student/document/create/{id}', 'StudentController@document_create');
    Route::post('/student/document/post}', 'StudentController@document_post');
    Route::delete('/student/document/{id}', 'StudentController@document_destroy');


    Route::resource('fee_payment', 'FeeTransactionPaymentController');
    Route::get('fee-receipt', 'FeeTransactionPaymentController@feeReceipt');
    Route::get('/sells/pos/get_product_row/{variation_id}/{location_id}', 'SellPosController@getProductRow');

    Route::get('/payment/student/get_student_detail/{student_id}/{campus_id}', 'FeeTransactionPaymentController@getStudentPaymentDetails');
    Route::resource('setting', 'SystemSettingController');
    Route::post('/test-email', 'SystemSettingController@testEmailConfiguration');
    Route::post('/test-sms', 'SystemSettingController@testSmsConfiguration');
    Route::resource('designation', 'DesignationController');
    Route::resource('campuses', 'CampusController');
    Route::resource('awards', 'AwardController');
    Route::resource('discounts', 'DiscountController');
    Route::resource('class_levels', 'ClassLevelController');
    Route::resource('classes', 'ClassController');
    Route::resource('sections', 'ClassSectionController');
    Route::resource('categories', 'CategoryController');
    Route::resource('provinces', 'ProvinceController');
    Route::resource('districts', 'DistrictController');
    Route::resource('cities', 'CityController');
    Route::resource('fee-heads', 'FeeHeadController');
    Route::resource('fee-increment', 'FeeIncrementController');

    Route::resource('regions', 'RegionController');
    Route::resource('students', 'StudentController');
    Route::resource('online-applicants', 'OnlineApplicantController');
    Route::resource('fee-allocation', 'FeeAllocationController');
    Route::post('fees-assign-search', 'FeeAllocationController@feesAssignSearch')->name('fees-assign-search');
    Route::get('bulk-fee-allocation-create', 'FeeAllocationController@bulkAllocationCreate');
    Route::post('bulk-fee-allocation-post', 'FeeAllocationController@bulkAllocationPost');

    require_once 'teacher.php';
    
    require_once 'printing.php';
    /////HRM///
    
Route::resource('leave_application_students', 'LeaveApplicationStudentController');
Route::post('leave_applications/update-status', 'LeaveApplicationStudentController@updateStatus');

Route::resource('hrm-leave_applications', 'LeaveApplicationEmployeeController');
Route::post('hrm-leave_applications/update-status', 'LeaveApplicationEmployeeController@updateStatus');

Route::resource('hrm-department', 'Hrm\HrmDepartmentController');
Route::resource('hrm-allowance', 'Hrm\HrmAllowanceController');
Route::resource('hrm-deduction', 'Hrm\HrmDeductionController');
Route::resource('hrm-print', 'Hrm\HrmPrintController');
Route::get('employee-list-print', 'Hrm\HrmPrintController@employeeListPrintCreate');
Route::post('employee-list-print-post', 'Hrm\HrmPrintController@PostEmployeePrint');
Route::resource('hrm-designation', 'Hrm\HrmDesignationController');
Route::resource('hrm-education', 'Hrm\HrmEducationController');
Route::resource('hrm-leave_category', 'Hrm\HrmLeaveCategoryController');
Route::resource('hrm-shift', 'Hrm\HrmShiftController');
Route::resource('hrm-employee', 'Hrm\HrmEmployeeController');
Route::get('employee-profile/{id}', 'Hrm\HrmEmployeeController@employeeProfile');
Route::resource('hrm-payroll', 'Hrm\HrmPayrollController');
Route::post('payroll-assign-search', 'Hrm\HrmPayrollController@payrollAssignSearch')->name('payroll-assign-search');
Route::get('/hrm-sync-with-device/{id}', 'Hrm\HrmEmployeeController@syncWithDevice');
Route::get('/employee/ledger', 'Hrm\HrmEmployeeController@getLedger');
Route::get('/employee/documents', 'Hrm\HrmEmployeeController@get_documents');
Route::get('/employee/document/create/{id}', 'Hrm\HrmEmployeeController@document_create');
Route::post('/employee/document/post}', 'Hrm\HrmEmployeeController@document_post');
Route::delete('/employee/document/{id}', 'Hrm\HrmEmployeeController@document_destroy');


Route::get('/payments/pay-employee-due/{employee_id}', 'Hrm\HrmTransactionPaymentController@getPayEmployeeDue');
Route::post('/payments/pay-employee-due', 'Hrm\HrmTransactionPaymentController@postPayEmployeeDue');
Route::get('/payments/hrm-add_payment/{transaction_id}', 'Hrm\HrmTransactionPaymentController@addPayment');
///option 
Route::get('/payments/add_employee_advance_amount_payment/{employee_id}', 'Hrm\HrmTransactionPaymentController@addEmployeeAdvanceAmountPayment');
Route::post('/payments/hrm-post_advance_amount_payment', 'Hrm\HrmTransactionPaymentController@postAdvanceAmount');
///

Route::resource('hrm_payment', 'Hrm\HrmTransactionPaymentController');
Route::resource('hrm-attendance', 'Hrm\HrmAttendanceController');
Route::post('hrm-attendance-assign-search', 'Hrm\HrmAttendanceController@attendanceAssignSearch')->name('hrm-attendance-assign-search');



Route::post('employee/update-status', 'Hrm\HrmEmployeeController@updateStatus');
Route::post('employee/employee-resign', 'Hrm\HrmEmployeeController@employeeResign');
Route::post('/employee/register/check-email', 'Hrm\HrmEmployeeController@postCheckEmail')->name('employee.postCheckEmail');

Route::get('/shift/assign-users/{shift_id}', 'Hrm\HrmShiftController@getAssignUsers');
Route::post('/shift/assign-users', 'Hrm\HrmShiftController@postAssignUsers');


    ////HRM///
    
    Route::group(['prefix' => 'account'], function () {
        Route::resource('/account', 'AccountController');
        Route::get('/fund-transfer/{id}', 'AccountController@getFundTransfer');
        Route::post('/fund-transfer', 'AccountController@postFundTransfer');
        Route::get('/deposit/{id}', 'AccountController@getDeposit');
        Route::post('/deposit', 'AccountController@postDeposit');
        Route::get('/close/{id}', 'AccountController@close');
        Route::get('/activate/{id}', 'AccountController@activate');
        Route::get('/delete-account-transaction/{id}', 'AccountController@destroyAccountTransaction');
        Route::get('/get-account-balance/{id}', 'AccountController@getAccountBalance');
        Route::get('/edit-account-transaction/{id}', 'AccountController@editAccountTransaction');
        Route::post('/update-account-transaction/{id}', 'AccountController@updateAccountTransaction');
        Route::get('/get-account-transaction/{id}', 'AccountController@getAccountLedger');
        Route::post('/post-account-transaction', 'AccountController@postAccountLedger');
        Route::get('/balance-sheet', 'AccountReportsController@balanceSheet');
        Route::get('/trial-balance', 'AccountReportsController@trialBalance');
        // Route::get('/payment-account-report', 'AccountReportsController@paymentAccountReport');
        // Route::get('/link-account/{id}', 'AccountReportsController@getLinkAccount');
        // Route::post('/link-account', 'AccountReportsController@postLinkAccount');
        Route::get('/cash-flow', 'AccountController@cashFlow');
        Route::get('/debit/{id}', 'AccountController@getDebit');
        Route::post('/debit', 'AccountController@postDebit');
    });
    Route::resource('account-types', 'AccountTypeController');
    //Import students
    Route::get('/import-students', 'ImportStudentsController@index');
    Route::post('/import-students/store', 'ImportStudentsController@store');
    Route::post('/import-students/StudentImage', 'ImportStudentsController@StudentImage');
    Route::post('/import-students/employeeImport', 'ImportStudentsController@employeeImport');
    Route::get('/student-profile/{id}', 'StudentController@studentProfile');
    Route::get('/student/ledger', 'StudentController@getLedger');

    ///Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/get-totals', 'HomeController@getTotals');
    Route::get('/home/get-totals', 'HomeController@getTotals');

    ///
    Route::resource('qr-code-attendance', 'Attendance\QrCodeAttendanceController');
    Route::get('employee_qr-code-attendance', 'Attendance\QrCodeAttendanceController@employee_create');
    Route::resource('attendance', 'AttendanceController');
    Route::post('attendance-assign-search', 'AttendanceController@attendanceAssignSearch')->name('attendance-assign-search');
    Route::get('/sync-with-device/{id}', 'StudentController@syncWithDevice');
    Route::get('/clear-attendance', 'MappingController@clearAttendance');
    Route::get('/map-attendance', 'MappingController@employeeMapping');
    Route::get('/map-attendance-students', 'MappingController@studentsMapping');
    Route::get('/mark-absent-attendance-students', 'MappingController@markAbsent');


    Route::resource('report-attendance', 'Report\AttendanceReportController');
    Route::post('/attendance-employee', 'Report\AttendanceReportController@employeeStore');
    Route::get('/admission-form/{id}', 'StudentController@admissionForm');
    Route::get('/empty-admission-form', 'StudentController@emptyAdmissionForm');
    Route::resource('income-report', 'Report\IncomeReportController');
    Route::get('income-summary', 'Report\IncomeReportController@IncomeSummaryCreate');
    Route::post('income-summary-report', 'Report\IncomeReportController@getIncomeSummaryReport');
    Route::get('fee-paid-today', 'Report\IncomeReportController@FeePaidToday');
    Route::get('transport-fee-paid-today', 'Report\IncomeReportController@TransportFeePaidToday');
    Route::resource('class-report', 'Report\ClassReportController');
    Route::get('get-class-report', 'Report\ClassReportController@getClassReport');
    Route::resource('weekend-holiday', 'WeekendHolidayController');
    Route::resource('fee-collection', 'FeeCollectionController');
    Route::resource('fee-collection-individual', 'IndividualFeeCollectionController');
    Route::resource('other-fee', 'OtherFeeAllocationController');
    Route::post('fees-assign-search-other', 'OtherFeeAllocationController@feesAssignSearch')->name('other-fees-assign-search');
    Route::resource('general-sms', 'GeneralSmsController');

    ///WithdrawalRegisterController
    Route::resource('/certificate_bulk_print', 'Certificate\CertificateBulkPrintController');
    Route::post('/certificate_bulk_print-post', 'Certificate\CertificateBulkPrintController@BulkPrint');
    Route::resource('withdrawal_register', 'Certificate\WithdrawalRegisterController');
    Route::get('/withdrawalPrint', 'Certificate\WithdrawalRegisterController@withdrawalPrint');
    Route::get('/withdrawal/{id}', 'Certificate\WithdrawalRegisterController@withdrawalRegisterEdit');
    Route::put('/withdrawal-update/{id}', 'Certificate\WithdrawalRegisterController@withdrawalRegisterUpdate');
    Route::get('/withdrawal-students-list', 'Certificate\WithdrawalRegisterController@withdrawalStudent');
    Route::post('/issuePost', 'Certificate\CertificateController@issuePost');
    Route::resource('certificate-type', 'Certificate\CertificateTypeController');
    Route::resource('certificate-issue', 'Certificate\CertificateController');
    Route::resource('certificate-print', 'Certificate\CertificatePrintController');


    ///WithdrawalRegisterController



    /////Exam///
    Route::resource('exam/routine-test', 'Examination\RoutineTestController');
    Route::post('exam/mark/routine-test-post', 'Examination\RoutineTestController@postSubjectResult');
    Route::post('exam/routine-test-entry-print', 'Examination\RoutineTestController@markEnteryPrint');
    Route::post('exam/routine-test-print', 'Examination\RoutineTestController@routinePrint');
    Route::get('exam/routine-test-student', 'Examination\RoutineTestController@studentCreate');
    ///
    Route::resource('exam/grades', 'Examination\GradeController');
    Route::get('/exam/bulk-mark-sheet/print', 'Examination\ExamResultController@bulkMarkSheetPrint');
    Route::get('/position-list', 'Examination\ExamResultController@topPositionListCreate');
    Route::post('/position-list-print', 'Examination\ExamResultController@topPositionListStore');
    Route::resource('exam/result', 'Examination\ExamResultController');
    Route::resource('exam/mark', 'Examination\ExamMarkController');
    Route::post('exam/mark/post', 'Examination\ExamMarkController@postSubjectResult');
    Route::post('exam/mark_entry_print', 'Examination\ExamMarkController@markEnteryPrint');
    Route::resource('exam/term', 'Examination\TermController');
    Route::resource('exam/setup', 'Examination\ExamSetupController');
    Route::get('/exam/get_enrolled_students/{id}', 'Examination\ExamSetupController@enrolledStudents');
    Route::get('/exam/get_enrolled_subjects/{id}', 'Examination\ExamSetupController@enrolledSubjects');
    Route::post('/exam/get_enrolled_delete_subjects', 'Examination\ExamSetupController@postDeleteSubjects');
    Route::get('/exam/get_missing_subjects/{id}', 'Examination\ExamSetupController@missingSubjects');
    Route::post('/exam/get_missing_subjects', 'Examination\ExamSetupController@postMissingSubjects');
    Route::resource('exam/date_sheets', 'Examination\ExamDateSheetController');
    Route::get('/exam/date_sheets_bulk_create', 'Examination\ExamDateSheetController@bulkCreate');
    Route::post('/exam/date_sheets/get/subjects', 'Examination\ExamDateSheetController@getSubjectDateSheet');
    Route::post('/exam/date_sheets/get/bulk-post-date-sheet', 'Examination\ExamDateSheetController@bulkPostDateSheet');

    Route::get('/exam/get_term', 'Examination\ExamSetupController@getExamTerm');
    Route::get('/exam/update_subjects_marks/{id}', 'Examination\ExamSetupController@updateSubjectsMark');
    Route::post('/exam/update_subjects_marks_post', 'Examination\ExamSetupController@updateSubjectsMarkPost');
    Route::get('/exam/roll_no_slip', 'Examination\ExamDateSheetController@createClassWiseRollSlipPrint');
    Route::get('/exam/post_roll_no_slip', 'Examination\ExamDateSheetController@postClassWiseRollSlipPrint');
    Route::get('/exam/single_roll_no_slip', 'Examination\ExamDateSheetController@RollSlipPrint');
    Route::get('/exam/lable/print', 'Examination\ExamDateSheetController@lablePrint');
    Route::get('/exam/award-attendance', 'Examination\AwardAttendanceController@index');
    Route::get('/exam/award-attendance-print', 'Examination\AwardAttendanceController@print');
    Route::get('/exam/award-attendance-print', 'Examination\AwardAttendanceController@print');
    Route::resource('tabulation_sheet', 'Examination\TabulationController');
    Route::get('/exam/tabulation-sheet/print', 'Examination\TabulationController@tabulationSheetPrint');
    Route::get('/exam/top-positions-print', 'Examination\ExamResultController@topPositionsCreate');
    Route::post('/exam/top-positions-post', 'Examination\ExamResultController@topPositionsPost');
///
Route::get('/exam/single-date-sheet', 'Examination\ExamDateSheetController@singleDateSheet');

    //Promotion
    Route::resource('promotion', 'Examination\PromotionController');
    Route::post('/promotion-student/list', 'Examination\PromotionController@getStudentList');
    Route::post('/with-out-exam-promotion/student/list', 'Examination\PromotionController@withoutGetStudentList');
    Route::get('/pass-out-create/student/list', 'Examination\PromotionController@passOutCreate');
    Route::post('/pass-out-post/student/list', 'Examination\PromotionController@passOutPost');
    Route::post('/pass-out', 'Examination\PromotionController@passOut');
    Route::post('/without-exam-promotion', 'Examination\PromotionController@withoutExamPromotion');
    //Expense Categories...
    Route::resource('expense-categories', 'ExpenseCategoryController');
    //Expenses...
    Route::resource('expenses', 'ExpenseTransactionController');
    Route::resource('expense_payment', 'ExpenseTransactionPaymentController');
    Route::get('/payments/expense-add_payment/{transaction_id}', 'ExpenseTransactionPaymentController@addPayment');
    //Transport
    Route::resource('vehicles', 'VehicleController');
    Route::resource('assignments', 'AssignmentController');
    Route::resource('announcements', 'AnnouncementController');
    Route::resource('sliders', 'MobileSliderController');


    //Reports
    Route::resource('report/payments', 'Report\PaymentController'); 
    Route::resource('report/top-defaulter', 'Report\TopDefaulterController'); 
    Route::resource('report/strength', 'Report\StrengthController'); 
    Route::get('/reports/expense-report', 'Report\ReportController@getExpenseReport');

    Route::resource('note-book', 'NoteBookStatusController'); 

    Route::get('note-print-empty-create', 'NoteBookStatusController@noteBookEmptyPrintCreate');
    Route::post('note-print-empty-post', 'NoteBookStatusController@noteBookEmptyPrintStore');
    Route::post('note-print-assign-post', 'NoteBookStatusController@noteBookAssignSearch');
    Route::post('note-assign-post', 'NoteBookStatusController@noteBookAssignPost');
    Route::post('note-print', 'NoteBookStatusController@noteBookPrint');

    //role
    Route::resource('roles', 'RoleController');

    //Backup
    Route::get('backup/download/{file_name}', 'BackUpController@download');
    Route::get('backup/delete/{file_name}', 'BackUpController@delete');
    Route::resource('backup', 'BackUpController', ['only' => [
        'index', 'create', 'store'
    ]]);
   
    Route::resource('galleries', 'Frontend\FrontGalleryController');
    Route::get('/gallery-add-image-video/{id}', 'Frontend\FrontGalleryController@addImage');
    Route::get('/gallery-element/{id}', 'Frontend\FrontGalleryController@element');
    Route::put('/gallery-elements/{id}', 'Frontend\FrontGalleryController@storeElement');
    Route::get('/gallery-elements/{id}/{elem_id}', 'Frontend\FrontGalleryController@upload_delete');
    Route::resource('front-settings', 'Frontend\FrontSettingController');
    Route::resource('front-sliders', 'Frontend\FrontSliderController');
    Route::resource('front-abouts', 'Frontend\FrontAboutController');
    Route::resource('front-news', 'Frontend\FrontNewsController');
    Route::resource('front-notices', 'Frontend\FrontNoticeController');
    Route::resource('front-events', 'Frontend\FrontEventController');
    Route::resource('front-counters', 'Frontend\FrontCounterController');
    Route::resource('front-page-navbar', 'Frontend\FrontCustomPageNavbarController');
    Route::resource('front-custom-page', 'Frontend\FrontCustomPageController');
    Route::get('/front-custom-page-add-image-video/{id}', 'Frontend\FrontCustomPageController@addImage');
    Route::get('/front-custom-page-element/{id}', 'Frontend\FrontCustomPageController@element');
    Route::put('/front-custom-page-elements/{id}', 'Frontend\FrontCustomPageController@storeElement');
    Route::get('/front-custom-page-elements/{id}/{elem_id}', 'Frontend\FrontCustomPageController@upload_delete');

    Route::resource('sms-logs', 'WhatsAppController');
    Route::get('sms-status', 'WhatsAppController@smsStatus');
    Route::get('send-sms', 'WhatsAppController@attendanceSmsSend');
    Route::get('job-empty', 'WhatsAppController@jobEmpty');

    Route::get('/check-login', 'WhatsAppController@checkLogin');
    Route::get('/whatsapp-check-auth', 'WhatsAppController@checkAuth');
    	//whatsapp Gateway
		Route::get('whatsapp/gateway/create', [WhatsappDeviceController::class, 'create'])->name('gateway.whatsapp.create');
		Route::post('whatsapp/gateway/create', [WhatsappDeviceController::class, 'store']);
		Route::get('whatsapp/gateway/edit/{id}', [WhatsappDeviceController::class, 'edit'])->name('gateway.whatsapp.edit');
		Route::post('whatsapp/gateway/update', [WhatsappDeviceController::class, 'update'])->name('gateway.whatsapp.update');
		Route::post('whatsapp/gateway/status-update', [WhatsappDeviceController::class, 'statusUpdate'])->name('gateway.whatsapp.status-update');
		Route::post('whatsapp/gateway/delete', [WhatsappDeviceController::class, 'delete'])->name('gateway.whatsapp.delete');
		Route::post('whatsapp/gateway/qr-code', [WhatsappDeviceController::class, 'getWaqr'])->name('gateway.whatsapp.qrcode');


});
    Route::middleware(['FrontSessionData'])->group(function () {

    Auth::routes();
    });
    Route::get('/', function () {
       return redirect('/home');
      //  return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});

