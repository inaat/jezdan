<?php

namespace App\Listeners;

use App\Events\TenantRegisterEvent;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TenantDomainCreate
{

    public function __construct()
    {
        //
    }

    public function handle(TenantRegisterEvent $event)
    {
        $tenant = Tenant::create(['id' => $event->subdomain,'tenancy_db_name' => $event->subdomain]);
        DB::table('tenants')->where('id',$tenant->id)->update(['user_id' => optional($event->user_info)->id, 'unique_key' => Hash::make(Str::random(32))]);
            $tenant->domains()->create(['domain' => $event->subdomain.'.'.env('CENTRAL_DOMAIN')]);

    }
}
