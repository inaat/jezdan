<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        // // initialize passport routes
        // Passport::routes();
       
        // Passport::tokensExpireIn(now()->addDays(5));
        // Passport::refreshTokensExpireIn(now()->addDays(30));
       
        Gate::before(function ($user, $ability) {
            if (in_array($ability, ['backup', 'superadmin', 
                'manage_modules'])) {
                $administrator_list = config('constants.administrator_usernames');
            
                if (in_array($user->email, explode(',', $administrator_list))) {
                    return true;
                }
            } else {
                if ($user->hasRole('Admin#' . $user->system_settings_id)) {
                    return true;
                }
            }
        });
    }
    
}
