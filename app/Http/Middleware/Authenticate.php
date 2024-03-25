<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   
        /**
         * Get the path the user should be redirected to when they are not authenticated.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return string|null
         */
        protected function redirectTo($request)
        {
          if (!$request->expectsJson()) {
            if (Route::is('admin.*')) {
              return route('admin.log');
            }
      
            if (Route::is('user.*')) {
              return route('user.login');
            }
          }
        }
      
}
