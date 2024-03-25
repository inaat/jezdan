<?php

namespace App\Http\Controllers\Saas\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PackageFeature;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;
use Paytabscom\Laravel_paytabs\Facades\paypage;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $language = $this->getLanguage();
    $queryResult['bgImg'] = $this->getBreadcrumb();

    $queryResult['months_packages']  = Package::where('interval','months')->orderBy('serial_number', 'asc')->get();
    $queryResult['years_packages']  = Package::where('interval','years')->orderBy('serial_number', 'asc')->get();
    $queryResult['life_time_packages']  = Package::where('interval','life_time')->orderBy('serial_number', 'asc')->get();
    $features = PackageFeature::get();
    $features_formatted = [];
    foreach ($features as $features) {
            $features_formatted[$features->id] = $features->name;
        
    }
    $queryResult['packageFeatures'] =$features_formatted;
    return view('saas.front.pricing', $queryResult);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $queryResult['bgImg'] = $this->getBreadcrumb();

        $queryResult['package']  = Package::find($id);
        
        return view('saas.front.package-registration', $queryResult);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkout(Request $request)
    {
       
       // Validation rules
       $rules = [
        'id' => 'required', // Adjust the 'users' table name accordingly
        'username' => 'required|unique:users', // Adjust the 'users' table name accordingly
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
    ];

    // Custom error messages
    $messages = [
        'username.required' => 'Username is required.',
        'username.unique' => 'Username is already taken.',
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'Email is already taken.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters long.',
        'password.confirmed' => 'Password confirmation does not match.',
    ];
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return back()
        ->withErrors($validator)
        ->withInput();
    }

    // Validate the request
    $request->validate($rules, $messages);
    $queryResult['bgImg'] = $this->getBreadcrumb();
    $queryResult['step1'] = $request->input();
   
    $queryResult['package']  = Package::find($request->id);
    $package = Package::active()->find($request->id);
    $queryResult['dates'] = $this->_get_package_dates( $package);
    $queryResult['currencyInfo'] = $this->getCurrencyInfo();


    return view('saas.front.checkout', $queryResult);

    }

    public function finalCheckout(Request $request)
    {
        //dd($request->input());
         // Retrieve input data from the request
    $inputData = $request->input();
        $pay= paypage::sendPaymentCode('all')
        ->sendTransaction('sale','ecom')
        ->sendCart($inputData['package_id'] ,$inputData['price'],json_encode($inputData))
        // ->sendCustomerDetails(
        //     $inputData['first_name'] . ' ' . $inputData['last_name'],
        //     $inputData['email'],
        //     $inputData['phone'],
        //     $inputData['address'],
        //     $inputData['city'],
        //     $inputData['district'],
        //     $inputData['country'],
        //     '', // Assuming you have a 'postal_code' field
        //     $request->ip()
        // )
        // ->sendShippingDetails(    $inputData['first_name'] . ' ' . $inputData['last_name']
        // ,   $inputData['email'], $inputData['phone'], $inputData['address'], $inputData['city'], $inputData['district'],  $inputData['country'], '',$request->ip())

        ->sendCustomerDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EG', '1234','100.279.20.10')
        ->sendShippingDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EG', '1234','100.279.20.10')
        ->sendURLs('https://jezdan.test/','https://explainerkhan.com/api/payment/callback')
        ->sendLanguage('en')
        ->create_pay_page();
    return $pay;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     /**
     * The function returns the start/end/trial end date for a package.
     *
     * @param object $package
     *
     * @return array
     */
    protected function _get_package_dates($package)
    {
        $output = ['start' => '', 'end' => '', 'trial' => ''];

        //calculate start date
        $start_date = Subscription::end_date();
        $output['start'] = $start_date->toDateString();

        //Calculate end date
        if ($package->interval == 'days') {
            $output['end'] = $start_date->addDays($package->interval_count)->toDateString();
        } elseif ($package->interval == 'months') {
            $output['end'] = $start_date->addMonths($package->interval_count)->toDateString();
        } elseif ($package->interval == 'years') {
            $output['end'] = $start_date->addYears($package->interval_count)->toDateString();
        }
        $output['trial'] = $start_date->addDays($package->trial_days)->toDateString();

        return $output;
    }

}
