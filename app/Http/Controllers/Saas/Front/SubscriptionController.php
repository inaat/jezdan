<?php

namespace App\Http\Controllers\Saas\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PackageFeature;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;
use Paytabscom\Laravel_paytabs\Facades\paypage;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ContactFormMail;
use App\Notifications\SendMessageToEndUser;
use App\Mail\TestEmail;
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
       
        $package = Package::active()->find($request->input('package_id'));
       // dd($request->input());
        if($package->price>0){
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
        }else{
           $user = $this->createUserWithTenant($request);
      //      Mail::to('info@sirms.edu.pk')->send(new ContactFormMail($data));
            //Mail::to('inayatullahkks@gmail.com')->send(new SendMessageToEndUser($request->input('first_name')));
        }

    }


    function createUserWithTenant($request)
    {
        $user = User::create([
            'name' => $request->first_name . ' '. $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => Str::slug($request->username),
            'has_subdomain' => 1,
            'country' => $request->country,
            'city' => $request->city,
            'mobile' => $request->phone,
            'state' => $request->state,
            'address' => $request->address,
            'school_name' => $request->name,
        ]);
    
        $subdomain = $request->username;
    
        $tenant = Tenant::create(['id' => $subdomain, 'tenancy_db_name' => $subdomain]);
        DB::table('tenants')->where('id', $tenant->id)->update(['user_id' => $user->id, 'unique_key' => Hash::make(Str::random(32))]);
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
    
        // You might return any relevant data here, depending on your requirements
        return $user;
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
