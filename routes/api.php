<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
/*
/*
|------------
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});
Route::post('/payment/callback', function (Request $request) {
    // Handle callback logic here
    \Log::emergency($request->input('cart_id'));
    dd(555);
 
});
// Route::get('/payTab/successful', 'App\Http\Controllers\Api\GlobalController@payTabSuccessful');
// Route::post('/payment/successful', 'App\Http\Controllers\Api\GlobalController@payTabSuccessful');
Route::post('/PayTab/callback', 'App\Http\Controllers\Api\GlobalController@AfterPayTabSuccessfulCreateTenant');

Route::middleware([
    'api',
    \App\Http\Middleware\Tenant\InitializeTenancyByDomainCustomisedMiddleware::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
Route::post('/PayTab/fee/callback', 'App\Http\Controllers\Api\GlobalController@FeePayTabSuccessful');
});
// Route::post('/payment/successful', function (Request $request) {
//     // Handle callback logic here
//     \Log::emergency($request);
//     dd(555);
 
// });