<?php

namespace App\Http\Controllers\Saas\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Events\TenantRegisterEvent;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class TenantManageController extends Controller
{

    public function index(){
     // dd(Hash::make('123456789'));
        ////dd(env('CENTRAL_DOMAIN'));
        $all_tenants=Tenant::with('user')->latest()->paginate(10);
     //   dd($all_tenants);
        //$all_users = User::latest()->paginate(10);

        return view('saas.admin.tenant.index',compact('all_tenants'));
    }


    public function subdomain_check(Request $request)
    {
        $this->validate($request, [
            'subdomain' => 'required|unique:tenants,id'
        ]);
        return response()->json('ok');
    }

    public function new_tenant_store(Request $request)
    {
        $rules=[
            'name'=> 'required|string|max:191',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country'=> 'required',
            'city'=> 'required',
             'mobile'=> 'required',
            'state'=> 'required',
            'address'=> 'required',
             'username'=> 'required|unique:users',
            'school_name'=> 'required',
            'subdomain' => 'required|unique:tenants,id'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Response::json([
              'errors' => $validator->getMessageBag()->toArray()
            ], 400);
          }
          

        //  Tenant::create([
        //     'id' => $subdomain,
        // ]);
        // Domain::create([
        //     'tenant_id' => $subdomain,
        //     'domain' => $subdomain
        //    // 'url' => "http://".$name.".injazatsoftware.net",
        // ]);

        
        $subdomain=$request->subdomain;
    
      //  try{
     
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('12345678'),
                'username' => Str::slug($request->username),
                'has_subdomain' => 1,
                'country' => $request->country,
                'city' => $request->city,
                'mobile' => $request->mobile,
                'state' => $request->state,
                'address' => $request->address,
                'school_name' => $request->name,
            ]);
       
     //  event(new TenantRegisterEvent($user, $subdomain));
     $subdomain=$request->subdomain;

     $tenant = Tenant::create(['id' => $subdomain,'tenancy_db_name' => $subdomain]);
     DB::table('tenants')->where('id',$tenant->id)->update(['user_id' => $user->id, 'unique_key' => Hash::make(Str::random(32))]);
         $tenant->domains()->create(['domain' => $subdomain.'.'.'jezdan.co']);

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

    //exec('cd ' . base_path() . ' && php artisan Customtenants:seed --tenants=' . $name . ' --force');
   
    // Committing all the actions
    // } catch (\Exception $exception) {

    //     $message = $exception->getMessage();
    //     dd($message);
    //     // $request->session()->flash('success', 'New blog category added successfully!');

    
    //     // Rollback all the actions
    //     // return response()->json(['status' => 'success'], 200);
 

    // }
    $request->session()->flash('success', 'Tenant has been created successfully..!!');

    return response()->json(['status' => 'success'], 200);
        // return response()->error(ResponseMessage::success(__('Tenant has been created successfully..!')));

    }

    public function deleteTenant(Request $request, $id)
{
    // Find the tenant
    $tenant = Tenant::findOrFail($id);
    // dd($tenant);
    // Delete the tenant's data
    $tenant->delete();

    // Delete tenant-related data from other tables if necessary
    // For example, if tenants have associated users
    $tenant->user()->delete();

    // Delete tenant's files if applicable
    // You may need to adjust this based on your file storage setup
    //Storage::deleteDirectory('tenants/' . $tenant->id);

    // Drop the tenant's database
  //  DB::statement("DROP DATABASE IF EXISTS `{$tenant->database_name}`");

    // Optionally, you can redirect the user to a page after deletion
    return redirect()->route('admin.tenant.index')->with('success', 'Tenant deleted successfully.');
}
}
