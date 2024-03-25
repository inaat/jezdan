<?php

namespace App\Http\Controllers\Saas\Admin;

use App\Helpers\Payment\DatabaseUpdateAndMailSend\LandlordPricePlanAndTenantCreate;
use App\Helpers\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\PaymentLogs;
use App\Models\Tenant;
use App\Models\TenantException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\DB;


class TenantExceptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function website_issues()
    {
        $all_issues = TenantException::where(['domain_create_status'=> 0, 'seen_status' => 0])->get();
        return view('landlord.admin.user-website-issues.all-issues', compact('all_issues'));
    }

    public function generate_domain(Request $request)
    {

        $id = $request->id;

        $exception = TenantException::findOrFail($id);
        $tenant = Tenant::find($exception->tenant_id);

        if(is_null($tenant)){
            return response()->danger(__('tenant did not found'));
        }

        $payment_log = PaymentLogs::where('tenant_id',$tenant->id)->first();
        if(is_null($payment_log)){
            return response()->danger(__('tenant payment log not found'));
        }

        $payment_data = [];
        $payment_data['order_id'] = $payment_log->id;
        LandlordPricePlanAndTenantCreate::update_tenant($payment_data); //tenant table user_id update and expired date update
        LandlordPricePlanAndTenantCreate::update_database($payment_log->id, $payment_log->transaction_id); //update payment log  information with transaction id


        try{
            $tenant->database()->manager()->createDatabase($tenant);

        }catch(\Exception $e){

            //todo check str_contains database exists
            $message = $e->getMessage();

            if(!\str_contains($message,'database exists')){
                return response()->danger(__('Database created failed, Make sure your database user has permission to create database'));
            }

            if(\str_contains($message,'database exists')){
                return response()->danger(__('Data already Exists'));
            }

        }

        try{
            $tenant->domains()->create(['domain' => $tenant->getTenantKey().'.'.getenv('CENTRAL_DOMAIN')]);
        }catch(\Exception $e){
            $message = $e->getMessage();
            if(!str_contains($message,'occupied by another tenant')){
                return response()->danger(__('subdomain create failed'));
            }
        }

        try{
            //database migrate
            $command = 'tenants:migrate --force --tenants='.$tenant->id;
            Artisan::call($command);
        }catch(\Exception $e){
            return response()->danger(__('tenant database migrate failed'));
        }

        try{
            Artisan::call('tenants:seed', [
                '--tenants' => $tenant->getTenantKey(),
                '--force' => true
            ]);

            $exception->domain_create_status = 1;
            $exception->seen_status = 1;
            $exception->save();

            LandlordPricePlanAndTenantCreate::tenant_create_event_with_credential_mail($payment_log->id,false);
            LandlordPricePlanAndTenantCreate::send_order_mail($payment_log->id);

            return response()->success(ResponseMessage::SettingsSaved('Database and domain create success'));


        }catch(\Exception $e){

            //Duplicate entry
            $message = $e->getMessage();
            if(str_contains($message,'Duplicate entry')){
                $exception->domain_create_status = 1;
                $exception->seen_status = 1;
                $exception->save();
                return response()->danger(__('tenant database demo data already imported'));

            }
            //todo, tested in user shared hosting website...
            //this code is work fine in shared hosting, without change of database engine

            if(str_contains($message,'Connection could not be established with host')){
                return response()->success(__('tenant database migrate and import success and website is ready to use, mail not send to user because your smtp not working.'));
            }
        }


        return response()->success(ResponseMessage::SettingsSaved('Database and domain create success'));
    }


    public function set_database_manually(Request $request)
    {

        $request->validate([
            'manual_database_name' => 'required|string|max:191'
        ]);


        $id = $request->id;
        $manual_database = $request->manual_database_name;

        $exception = TenantException::findOrFail($id);
        $tenant = Tenant::find($request->domain);



        if(is_null($tenant)){
            return response()->danger(__('tenant did not found'));
        }


        if(!empty($tenant) && $tenant->id == $manual_database){
            return response()->danger(__('Database exists with this name'));
        }


        $payment_log = PaymentLogs::where('tenant_id',$tenant->id)->first();
        if(is_null($payment_log)){
            return response()->danger(__('tenant payment log not found'));
        }

        $payment_data = [];
        $payment_data['order_id'] = $payment_log->id;
        LandlordPricePlanAndTenantCreate::update_tenant($payment_data); //tenant table user_id update and expired date update
        LandlordPricePlanAndTenantCreate::update_database($payment_log->id, $payment_log->transaction_id); //update payment log  information with transaction id

        try{

            $current_tenant = \DB::table('tenants')->where('id',$tenant->id)->first();
            $format = (array) json_decode($current_tenant->data);
            $format['tenancy_db_name'] = $manual_database;
            \Illuminate\Support\Facades\DB::table('tenants')->where('id',$tenant->id)->update(['data'=> json_encode($format)]);


        }catch(\Exception $e){

            // todo check str_contains database exists
            $message = $e->getMessage();


            if(\str_contains($message,'Access denied')){
                return response()->danger(__('Wrong database or your user privilege has not been set'));
            }


            if(\str_contains($message,'database exists')){
                return response()->danger(__('Data already Exists'));
            }

        }

        try{
            $tenant->domains()->create(['domain' => $tenant->getTenantKey().'.'.getenv('CENTRAL_DOMAIN')]);
        }catch(\Exception $e){
            $message = $e->getMessage();
            if(!str_contains($message,'occupied by another tenant')){
                return response()->danger(__('subdomain create failed'));
            }
        }

        try{
            //database migrate
            $command = 'tenants:migrate --force --tenants='.$tenant->id;
            Artisan::call($command);
        }catch(\Exception $e){
            return response()->danger(__('tenant database migrate failed'));
        }

        try{
            Artisan::call('tenants:seed', [
                '--tenants' => $tenant->getTenantKey(),
                '--force' => true
            ]);

            $exception->domain_create_status = 1;
            $exception->seen_status = 1;
            $exception->save();

            LandlordPricePlanAndTenantCreate::tenant_create_event_with_credential_mail($payment_log->id,false);
            LandlordPricePlanAndTenantCreate::send_order_mail($payment_log->id);

            return response()->success(ResponseMessage::SettingsSaved('Database and domain create success'));


        }catch(\Exception $e){

            //Duplicate entry
            $message = $e->getMessage();
            if(str_contains($message,'Duplicate entry')){
                $exception->domain_create_status = 1;
                $exception->seen_status = 1;
                $exception->save();
                return response()->danger(__('tenant database demo data already imoported'));

            }
            return response()->danger(__('tenant database demo data import failed'));
        }

        $exception->domain_create_status = 1;
        $exception->seen_status = 1;
        $exception->save();

        LandlordPricePlanAndTenantCreate::tenant_create_event_with_credential_mail($payment_log->id,false);
        LandlordPricePlanAndTenantCreate::send_order_mail($payment_log->id);

        return response()->success(ResponseMessage::SettingsSaved('Database and domain create success'));

    }


    public function issue_delete($id)
    {
        TenantException::find($id)->delete();
        return response()->success(ResponseMessage::SettingsSaved('Issue Deleted Successfully..!'));
    }

}
