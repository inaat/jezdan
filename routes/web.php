<?php

use Illuminate\Support\Facades\Route;
use App\Events\TenantRegisterEvent;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
|--------------------------------------------------------------------------
| Custom Page Route For UI
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Saas\Front\HomeController;
use App\Http\Controllers\Saas\Front\GlobalController;
Route::get('/get_states', 'Saas\Front\GlobalController@getStates');
Route::get('/get_cities', 'Saas\Front\GlobalController@getCities');

Route::get('/check/{username}/username', [HomeController::class, 'checkUsername']);

Route::get('/custom/{slug}', 'Saas\Front\PageController@page')->name('dynamic_page')->middleware('change.lang');

// fallback route
Route::fallback(function () {
  //
})->middleware('change.lang');

Route::get('/change-language', 'Controller@changeLanguage')->name('change_language');

Route::post('/store-subscriber', 'Controller@storeSubscriber')->name('store_subscriber');

Route::middleware('change.lang')->group(function () {
  Route::get('/', 'Saas\Front\HomeController@index')->name('index');
  
    Route::get('/blogs', 'Saas\Front\BlogController@blogs')->name('blogs');
  
    Route::get('/blog/{slug}', 'Saas\Front\BlogController@details')->name('blog_details');
  
     Route::get('/faq', 'Saas\Front\FaqController@faqs')->name('faqs');
  
     Route::get('/contact', 'Saas\Front\ContactController@contact')->name('contact');
     Route::get('/pricing', 'Saas\Front\SubscriptionController@index')->name('pricing');
     Route::get('/registration/step-1/regular/{id}', 'Saas\Front\SubscriptionController@create')->name('package.registration');
     Route::post('/registration/final-step', 'Saas\Front\SubscriptionController@checkout');
     Route::post('/registration/final-checkout', 'Saas\Front\SubscriptionController@finalCheckout')->name('package.finalCheckout');;


});
Route::post('/contact/send-mail', 'Saas\Front\ContactController@sendMail')->name('contact.send_mail');
Route::prefix('/user')->middleware(['guest:web', 'change.lang'])->group(function () {
  // user redirect to login page route
  Route::get('/login', 'Saas\Front\UserController@login')->name('user.login');

  // user login submit route
  Route::post('/login-submit', 'Saas\Front\UserController@loginSubmit')->name('user.login_submit')->withoutMiddleware('change.lang');

  // user forget password route
  Route::get('/forget-password', 'Saas\Front\UserController@forgetPassword')->name('user.forget_password');

  // send mail to user for forget password route
  Route::post('/send-forget-password-mail', 'Saas\Front\UserController@sendMail')->name('user.send_forget_password_mail')->withoutMiddleware('change.lang');

  // reset password route
  Route::get('/reset-password', 'Saas\Front\UserController@resetPassword');

  // user reset password submit route
  Route::post('/reset-password-submit', 'Saas\Front\UserController@resetPasswordSubmit')->name('user.reset_password_submit')->withoutMiddleware('change.lang');

  // user redirect to signup page route
  Route::get('/signup', 'Saas\Front\UserController@signup')->name('user.signup');

  // user signup submit route
  Route::post('/signup-submit', 'Saas\Front\UserController@signupSubmit')->name('user.signup_submit')->withoutMiddleware('change.lang');

  // signup verify route
  Route::get('/signup-verify/{token}', 'Saas\Front\UserController@signupVerify')->withoutMiddleware('change.lang');
});
Route::get('/school', function () {
   $user=User::find(9);
    $subdomain='school.jez';
    $is_tenant = Tenant::find($subdomain);

    DB::beginTransaction();
    try{
      
   event(new TenantRegisterEvent($user, $subdomain));
  
    DB::commit(); // Committing all the actions
} catch (\Exception $exception) {
    $message = $exception->getMessage();


    DB::rollBack(); // Rollback all the actions
    return  $message;
}

    return view('saas.front.index');
});
/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/admin')->middleware('guest:admin')->group(function () {
  // admin redirect to login page route
  Route::get('/login', 'Saas\Admin\AdminController@login')->name('admin.log');

  // admin login attempt route
  Route::post('/auth', 'Saas\Admin\AdminController@authentication')->name('admin.auth');

  // admin forget password route
  Route::get('/forget-password', 'Saas\Admin\AdminController@forgetPassword')->name('admin.forget_password');

  // send mail to admin for forget password route
  Route::post('/mail-for-forget-password', 'Saas\Admin\AdminController@sendMail')->name('admin.mail_for_forget_password');
});
Route::prefix('/admin')->middleware('auth:admin')->group(function () {
  Route::get('/', 'Saas\Admin\AdminController@redirectToDashboard')->name('admin.dashboard');

// Route::get('/', function () {
//     return view('saas.admin.index');
// })->name('admin.dashboard');

  // change admin-panel theme (dark/light) route
  Route::post('/change-theme', 'Saas\Admin\AdminController@changeTheme')->name('admin.change_theme');

  // admin p
Route::get('/logout', 'Saas\Admin\AdminController@logout')->name('admin.logout');

  // admin profile settings route start
  Route::get('/edit-profile', 'Saas\Admin\AdminController@editProfile')->name('admin.edit_profile');

  Route::post('/update-profile', 'Saas\Admin\AdminController@updateProfile')->name('admin.update_profile');

  Route::get('/change-password', 'Saas\Admin\AdminController@changePassword')->name('admin.change_password');

  Route::post('/update-password', 'Saas\Admin\AdminController@updatePassword')->name('admin.update_password');
  // admin profile settings route end
Route::prefix('/package-management')->group(function () {
  Route::get('/', 'Saas\Admin\PackageFeatureController@index')->name('admin.package-feature.index');


  Route::post('/store-package-feature', 'Saas\Admin\PackageFeatureController@store')->name('admin.package-feature.store');
  Route::put('/update-package-feature-update', 'Saas\Admin\PackageFeatureController@update')->name('admin.package-feature.update');
  Route::post('/delete-package-feature/{id}', 'Saas\Admin\PackageFeatureController@destroy')->name('admin.package-feature.delete');

  Route::get('/packages', 'Saas\Admin\PackageController@index')->name('admin.package.index');
  Route::get('/package', 'Saas\Admin\PackageController@create')->name('admin.package.create');
  Route::get('/package/{id}', 'Saas\Admin\PackageController@edit')->name('admin.package.edit');
  Route::post('/store-package', 'Saas\Admin\PackageController@store')->name('admin.package.store');
  Route::post('/update-package-update/{id}', 'Saas\Admin\PackageController@update')->name('admin.package.update');
  Route::post('/delete-package/{id}', 'Saas\Admin\PackageController@destroy')->name('admin.package.delete');
  



});
Route::prefix('/basic-settings')->group(function () {
    // basic settings favicon route
    Route::get('/favicon', 'Saas\Admin\BasicSettings\BasicController@favicon')->name('admin.basic_settings.favicon');

    Route::post('/update-favicon', 'Saas\Admin\BasicSettings\BasicController@updateFavicon')->name('admin.basic_settings.update_favicon');

    // basic settings logo route
    Route::get('/logo', 'Saas\Admin\BasicSettings\BasicController@logo')->name('admin.basic_settings.logo');

    Route::post('/update-logo', 'Saas\Admin\BasicSettings\BasicController@updateLogo')->name('admin.basic_settings.update_logo');

    // basic settings information route
    Route::get('/information', 'Saas\Admin\BasicSettings\BasicController@information')->name('admin.basic_settings.information');

    Route::post('/update-info', 'Saas\Admin\BasicSettings\BasicController@updateInfo')->name('admin.basic_settings.update_info');

    // basic settings (theme & home) route
    Route::get('/theme-and-home', 'Saas\Admin\BasicSettings\BasicController@themeAndHome')->name('admin.basic_settings.theme_and_home');

    Route::post('/update-theme-and-home', 'Saas\Admin\BasicSettings\BasicController@updateThemeAndHome')->name('admin.basic_settings.update_theme_and_home');

    // basic settings currency route
    Route::get('/currency', 'Saas\Admin\BasicSettings\BasicController@currency')->name('admin.basic_settings.currency');

    Route::post('/update-currency', 'Saas\Admin\BasicSettings\BasicController@updateCurrency')->name('admin.basic_settings.update_currency');

    // basic settings appearance route
    Route::get('/appearance', 'Saas\Admin\BasicSettings\BasicController@appearance')->name('admin.basic_settings.appearance');

    Route::post('/update-appearance', 'Saas\Admin\BasicSettings\BasicController@updateAppearance')->name('admin.basic_settings.update_appearance');

    // basic settings mail route start
    Route::get('/mail-from-admin', 'Saas\Admin\BasicSettings\BasicController@mailFromAdmin')->name('admin.basic_settings.mail_from_admin');

    Route::post('/update-mail-from-admin', 'Saas\Admin\BasicSettings\BasicController@updateMailFromAdmin')->name('admin.basic_settings.update_mail_from_admin');

    Route::get('/mail-to-admin', 'Saas\Admin\BasicSettings\BasicController@mailToAdmin')->name('admin.basic_settings.mail_to_admin');

    Route::post('/update-mail-to-admin', 'Saas\Admin\BasicSettings\BasicController@updateMailToAdmin')->name('admin.basic_settings.update_mail_to_admin');

    Route::get('/mail-templates', 'Saas\Admin\BasicSettings\MailTemplateController@index')->name('admin.basic_settings.mail_templates');

    Route::get('/edit-mail-template/{id}', 'Saas\Admin\BasicSettings\MailTemplateController@edit')->name('admin.basic_settings.edit_mail_template');

    Route::post('/update-mail-template/{id}', 'Saas\Admin\BasicSettings\MailTemplateController@update')->name('admin.basic_settings.update_mail_template');
    // basic settings mail route end

    // basic settings breadcrumb route
    Route::get('/breadcrumb', 'Saas\Admin\BasicSettings\BasicController@breadcrumb')->name('admin.basic_settings.breadcrumb');

    Route::post('/update-breadcrumb', 'Saas\Admin\BasicSettings\BasicController@updateBreadcrumb')->name('admin.basic_settings.update_breadcrumb');

 

    // basic settings plugins route start
    Route::get('/plugins', 'Saas\Admin\BasicSettings\BasicController@plugins')->name('admin.basic_settings.plugins');

    Route::post('/update-recaptcha', 'Saas\Admin\BasicSettings\BasicController@updateRecaptcha')->name('admin.basic_settings.update_recaptcha');

    Route::post('/update-disqus', 'Saas\Admin\BasicSettings\BasicController@updateDisqus')->name('admin.basic_settings.update_disqus');

    Route::post('/update-whatsapp', 'Saas\Admin\BasicSettings\BasicController@updateWhatsApp')->name('admin.basic_settings.update_whatsapp');
    // basic settings plugins route end

    // basic settings seo route
    Route::get('/seo', 'Saas\Admin\BasicSettings\SEOController@index')->name('admin.basic_settings.seo');

    Route::post('/update-seo', 'Saas\Admin\BasicSettings\SEOController@update')->name('admin.basic_settings.update_seo');

    // basic settings maintenance-mode route
    Route::get('/maintenance-mode', 'Saas\Admin\BasicSettings\BasicController@maintenance')->name('admin.basic_settings.maintenance_mode');

    Route::post('/update-maintenance-mode', 'Saas\Admin\BasicSettings\BasicController@updateMaintenance')->name('admin.basic_settings.update_maintenance_mode');

    // basic settings cookie-alert route
    Route::get('/cookie-alert', 'Saas\Admin\BasicSettings\CookieAlertController@cookieAlert')->name('admin.basic_settings.cookie_alert');

    Route::post('/update-cookie-alert', 'Saas\Admin\BasicSettings\CookieAlertController@updateCookieAlert')->name('admin.basic_settings.update_cookie_alert');

    // basic settings footer-logo route
    Route::get('/footer-logo', 'Saas\Admin\BasicSettings\BasicController@footerLogo')->name('admin.basic_settings.footer_logo');

    Route::post('/update-footer-logo', 'Saas\Admin\BasicSettings\BasicController@updateFooterLogo')->name('admin.basic_settings.update_footer_logo');

    // basic-settings social-media route
    Route::get('/social-medias', 'Saas\Admin\BasicSettings\SocialMediaController@index')->name('admin.basic_settings.social_medias');

    Route::post('/store-social-media', 'Saas\Admin\BasicSettings\SocialMediaController@store')->name('admin.basic_settings.store_social_media');

    Route::put('/update-social-media', 'Saas\Admin\BasicSettings\SocialMediaController@update')->name('admin.basic_settings.update_social_media');

    Route::post('/delete-social-media/{id}', 'Saas\Admin\BasicSettings\SocialMediaController@destroy')->name('admin.basic_settings.delete_social_media');
  });
  // home-page route start
  Route::prefix('/tenant')->group(function () {
    Route::get('/', 'Saas\Admin\TenantManageController@index')->name('admin.tenant.index');
    Route::post('/new_tenant_store', 'Saas\Admin\TenantManageController@new_tenant_store')->name('admin.tenant.new_tenant_store');
    Route::delete('/tenants/{id}', 'Saas\Admin\TenantManageController@deleteTenant')->name('tenants.delete');

  });
    // home-page route start
    Route::prefix('/home-page')->group(function () {
        // hero section
        Route::get('/hero-section', 'Saas\Admin\HomePage\HeroController@index')->name('admin.home_page.hero_section');
    
        Route::post('/update-hero-section', 'Saas\Admin\HomePage\HeroController@update')->name('admin.home_page.update_hero_section');
    
        // section title
        Route::get('/section-titles', 'Saas\Admin\HomePage\SectionTitleController@index')->name('admin.home_page.section_titles');
    
        Route::post('/update-section-titles', 'Saas\Admin\HomePage\SectionTitleController@update')->name('admin.home_page.update_section_title');
    
        // call to action section
        Route::get('/action-section', 'Saas\Admin\HomePage\ActionController@index')->name('admin.home_page.action_section');
    
        Route::post('/update-action-section', 'Saas\Admin\HomePage\ActionController@update')->name('admin.home_page.update_action_section');
    
        // features section
        Route::get('/features-section', 'Saas\Admin\HomePage\FeatureController@index')->name('admin.home_page.features_section');
    
        Route::post('/update-feature-section-image', 'Saas\Admin\HomePage\FeatureController@updateImage')->name('admin.home_page.update_feature_section_image');
    
        Route::post('/store-feature', 'Saas\Admin\HomePage\FeatureController@store')->name('admin.home_page.store_feature');
    
        Route::put('/update-feature', 'Saas\Admin\HomePage\FeatureController@update')->name('admin.home_page.update_feature');
    
        Route::post('/delete-feature/{id}', 'Saas\Admin\HomePage\FeatureController@destroy')->name('admin.home_page.delete_feature');
    
        Route::post('/bulk-delete-feature', 'Saas\Admin\HomePage\FeatureController@bulkDestroy')->name('admin.home_page.bulk_delete_feature');
    
        // video section
        Route::get('/video-section', 'Saas\Admin\HomePage\VideoController@index')->name('admin.home_page.video_section');
    
        Route::post('/update-video-section', 'Saas\Admin\HomePage\VideoController@update')->name('admin.home_page.update_video_section');
    
        // fun facts section
        Route::get('/work-process-section', 'Saas\Admin\HomePage\WorkProcessController@index')->name('admin.home_page.work_process');
    
    
        Route::post('/store-counter-info', 'Saas\Admin\HomePage\WorkProcessController@store')->name('admin.home_page.store-work-process');
    
        Route::put('/update-counter-info', 'Saas\Admin\HomePage\WorkProcessController@update')->name('admin.home_page.update_work_process');
    
        Route::post('/delete-counter-info/{id}', 'Saas\Admin\HomePage\WorkProcessController@destroy')->name('admin.home_page.delete_work_process');
    
    
        // testimonials section
        Route::get('/testimonials-section', 'Saas\Admin\HomePage\TestimonialController@index')->name('admin.home_page.testimonials_section');
    
        Route::post('/update-testimonial-section-image', 'Saas\Admin\HomePage\TestimonialController@updateImage')->name('admin.home_page.update_testimonial_section_image');
    
        Route::post('/store-testimonial', 'Saas\Admin\HomePage\TestimonialController@store')->name('admin.home_page.store_testimonial');
    
        Route::post('/update-testimonial', 'Saas\Admin\HomePage\TestimonialController@update')->name('admin.home_page.update_testimonial');
    
        Route::post('/delete-testimonial/{id}', 'Saas\Admin\HomePage\TestimonialController@destroy')->name('admin.home_page.delete_testimonial');
    
        Route::post('/bulk-delete-testimonial', 'Saas\Admin\HomePage\TestimonialController@bulkDestroy')->name('admin.home_page.bulk_delete_testimonial');
    
        // newsletter section
        Route::get('/newsletter-section', 'Saas\Admin\HomePage\NewsletterController@index')->name('admin.home_page.newsletter_section');
    
        Route::post('/update-newsletter-section', 'Saas\Admin\HomePage\NewsletterController@update')->name('admin.home_page.update_newsletter_section');
    
        // about-us section
        Route::get('/about-us-section', 'Saas\Admin\HomePage\AboutUsController@index')->name('admin.home_page.about_us_section');
    
        Route::post('/update-about-us-section', 'Saas\Admin\HomePage\AboutUsController@update')->name('admin.home_page.update_about_us_section');
    
        // course-categories section
        Route::get('/course-categories-section', 'Saas\Admin\HomePage\CourseCategoryController@index')->name('admin.home_page.course_categories_section');
    
        Route::post('/update-course-category-section-image', 'Saas\Admin\HomePage\CourseCategoryController@updateImage')->name('admin.home_page.update_course_category_section_image');
    
        // section customization
        Route::get('/section-customization', 'Saas\Admin\HomePage\SectionController@index')->name('admin.home_page.section_customization');
    
        Route::post('/update-section-status', 'Saas\Admin\HomePage\SectionController@update')->name('admin.home_page.update_section_status');
     
        // Partner
        Route::get('/partner-section', 'Saas\Admin\HomePage\PartnerController@index')->name('admin.home_page.partner_section');
        Route::post('/store-partner', 'Saas\Admin\HomePage\PartnerController@store')->name('admin.home_page.store_partner');
        
        Route::post('/update-partner', 'Saas\Admin\HomePage\PartnerController@update')->name('admin.home_page.update_partner');
    
        Route::post('/delete-partner/{id}', 'Saas\Admin\HomePage\PartnerController@destroy')->name('admin.home_page.delete_partner');
    

      });
      // home-page route end

  // advertise route start
  Route::prefix('/advertise')->group(function () {
    Route::get('/settings', 'Saas\Admin\BasicSettings\BasicController@advertiseSettings')->name('admin.advertise.settings');

    Route::post('/update-settings', 'Saas\Admin\BasicSettings\BasicController@updateAdvertiseSettings')->name('admin.advertise.update_settings');

    Route::get('/advertisements', 'Saas\Admin\AdvertisementController@index')->name('admin.advertise.advertisements');

    Route::post('/store-advertisement', 'Saas\Admin\AdvertisementController@store')->name('admin.advertise.store_advertisement');

    Route::post('/update-advertisement', 'Saas\Admin\AdvertisementController@update')->name('admin.advertise.update_advertisement');

    Route::post('/delete-advertisement/{id}', 'Saas\Admin\AdvertisementController@destroy')->name('admin.advertise.delete_advertisement');

    Route::post('/bulk-delete-advertisement', 'Saas\Admin\AdvertisementController@bulkDestroy')->name('admin.advertise.bulk_delete_advertisement');
  });
  // advertise route end

        // announcement-popup route start
  Route::prefix('/announcement-popups')->group(function () {
    Route::get('', 'Saas\Admin\PopupController@index')->name('admin.announcement_popups');

    Route::get('/select-popup-type', 'Saas\Admin\PopupController@popupType')->name('admin.announcement_popups.select_popup_type');

    Route::get('/create-popup/{type}', 'Saas\Admin\PopupController@create')->name('admin.announcement_popups.create_popup');

    Route::post('/store-popup', 'Saas\Admin\PopupController@store')->name('admin.announcement_popups.store_popup');

    Route::post('/popup/{id}/update-status', 'Saas\Admin\PopupController@updateStatus')->name('admin.announcement_popups.update_popup_status');

    Route::get('/edit-popup/{id}', 'Saas\Admin\PopupController@edit')->name('admin.announcement_popups.edit_popup');

    Route::post('/update-popup/{id}', 'Saas\Admin\PopupController@update')->name('admin.announcement_popups.update_popup');

    Route::post('/delete-popup/{id}', 'Saas\Admin\PopupController@destroy')->name('admin.announcement_popups.delete_popup');

    Route::post('/bulk-delete-popup', 'Saas\Admin\PopupController@bulkDestroy')->name('admin.announcement_popups.bulk_delete_popup');
  });
  // announcement-popup route end

      // payment-gateway route start
  Route::prefix('/payment-gateways')->group(function () {
    Route::get('/online-gateways', 'Saas\Admin\PaymentGateway\OnlineGatewayController@index')->name('admin.payment_gateways.online_gateways');

    Route::post('/update-paypal-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updatePayPalInfo')->name('admin.payment_gateways.update_paypal_info');

    Route::post('/update-instamojo-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updateInstamojoInfo')->name('admin.payment_gateways.update_instamojo_info');

    Route::post('/update-paystack-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updatePaystackInfo')->name('admin.payment_gateways.update_paystack_info');

    Route::post('/update-flutterwave-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updateFlutterwaveInfo')->name('admin.payment_gateways.update_flutterwave_info');

    Route::post('/update-razorpay-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updateRazorpayInfo')->name('admin.payment_gateways.update_razorpay_info');

    Route::post('/update-mercadopago-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updateMercadoPagoInfo')->name('admin.payment_gateways.update_mercadopago_info');

    Route::post('/update-mollie-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updateMollieInfo')->name('admin.payment_gateways.update_mollie_info');

    Route::post('/update-stripe-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updateStripeInfo')->name('admin.payment_gateways.update_stripe_info');

    Route::post('/update-paytm-info', 'Saas\Admin\PaymentGateway\OnlineGatewayController@updatePaytmInfo')->name('admin.payment_gateways.update_paytm_info');

    Route::get('/offline-gateways', 'Saas\Admin\PaymentGateway\OfflineGatewayController@index')->name('admin.payment_gateways.offline_gateways');

    Route::post('/store-offline-gateway', 'Saas\Admin\PaymentGateway\OfflineGatewayController@store')->name('admin.payment_gateways.store_offline_gateway');

    Route::post('/update-status/{id}', 'Saas\Admin\PaymentGateway\OfflineGatewayController@updateStatus')->name('admin.payment_gateways.update_status');

    Route::post('/update-offline-gateway', 'Saas\Admin\PaymentGateway\OfflineGatewayController@update')->name('admin.payment_gateways.update_offline_gateway');

    Route::post('/delete-offline-gateway/{id}', 'Saas\Admin\PaymentGateway\OfflineGatewayController@destroy')->name('admin.payment_gateways.delete_offline_gateway');
  });
  // payment-gateway route end


  
  // footer route start
  Route::prefix('/footer')->group(function () {
    Route::get('/content', 'Saas\Admin\Footer\ContentController@index')->name('admin.footer.content');

    Route::post('/update-content', 'Saas\Admin\Footer\ContentController@update')->name('admin.footer.update_content');

    Route::get('/quick-links', 'Saas\Admin\Footer\QuickLinkController@index')->name('admin.footer.quick_links');
    Route::post('/create-quick-link', 'Saas\Admin\Footer\QuickLinkController@store')->name('admin.footer.create_quick_link');


    Route::post('/update-quick-link', 'Saas\Admin\Footer\QuickLinkController@update')->name('admin.footer.update_quick_link');

    Route::post('/delete-quick-link/{id}', 'Saas\Admin\Footer\QuickLinkController@destroy')->name('admin.footer.delete_quick_link');
  });
  // footer route end
    // menu-builder route start
    Route::prefix('/menu-builder')->group(function () {
      Route::get('', 'Saas\Admin\MenuBuilderController@index')->name('admin.menu_builder');
  
      Route::post('/update-menus', 'Saas\Admin\MenuBuilderController@update')->name('admin.menu_builder.update_menus');
    });
    // menu-builder route end
    // faq route start
    Route::prefix('/faq-management')->group(function () {
      Route::get('', 'Saas\Admin\FaqController@index')->name('admin.faq_management');
  
      Route::post('/store-faq', 'Saas\Admin\FaqController@store')->name('admin.faq_management.store_faq');
  
      Route::post('/update-faq', 'Saas\Admin\FaqController@update')->name('admin.faq_management.update_faq');
  
      Route::post('/delete-faq/{id}', 'Saas\Admin\FaqController@destroy')->name('admin.faq_management.delete_faq');
  
      Route::post('/bulk-delete-faq', 'Saas\Admin\FaqController@bulkDestroy')->name('admin.faq_management.bulk_delete_faq');
    });
    // faq route end
  
    // blog route start
    Route::prefix('/blog-management')->group(function () {
      Route::get('/categories', 'Saas\Admin\Journal\CategoryController@index')->name('admin.blog_management.categories');
      Route::get('/{id}/getcats/', 'Saas\Admin\Journal\CategoryController@getcats')->name('admin.blog_management.getcats');
  
      Route::post('/store-category', 'Saas\Admin\Journal\CategoryController@store')->name('admin.blog_management.store_category');
  
      Route::put('/update-category', 'Saas\Admin\Journal\CategoryController@update')->name('admin.blog_management.update_category');
  
      Route::post('/delete-category/{id}', 'Saas\Admin\Journal\CategoryController@destroy')->name('admin.blog_management.delete_category');
  
      Route::post('/bulk-delete-category', 'Saas\Admin\Journal\CategoryController@bulkDestroy')->name('admin.blog_management.bulk_delete_category');
  
      Route::get('/blogs', 'Saas\Admin\Journal\BlogController@index')->name('admin.blog_management.blogs');
  
      Route::get('/create-blog', 'Saas\Admin\Journal\BlogController@create')->name('admin.blog_management.create_blog');
  
      Route::post('/store-blog', 'Saas\Admin\Journal\BlogController@store')->name('admin.blog_management.store_blog');
  
      Route::get('/edit-blog/{id}', 'Saas\Admin\Journal\BlogController@edit')->name('admin.blog_management.edit_blog');
  
      Route::post('/update-blog/{id}', 'Saas\Admin\Journal\BlogController@update')->name('admin.blog_management.update_blog');
  
      Route::post('/delete-blog/{id}', 'Saas\Admin\Journal\BlogController@destroy')->name('admin.blog_management.delete_blog');
  
      Route::post('/bulk-delete-blog', 'Saas\Admin\Journal\BlogController@bulkDestroy')->name('admin.blog_management.bulk_delete_blog');
    });
    // blog route end
  
  
  // custom-pages route start
  Route::prefix('/custom-pages')->group(function () {
    Route::get('', 'Saas\Admin\CustomPageController@index')->name('admin.custom_pages');

    Route::get('/create-page', 'Saas\Admin\CustomPageController@create')->name('admin.custom_pages.create_page');

    Route::post('/store-page', 'Saas\Admin\CustomPageController@store')->name('admin.custom_pages.store_page');

    Route::get('/edit-page/{id}', 'Saas\Admin\CustomPageController@edit')->name('admin.custom_pages.edit_page');

    Route::post('/update-page/{id}', 'Saas\Admin\CustomPageController@update')->name('admin.custom_pages.update_page');

    Route::post('/delete-page/{id}', 'Saas\Admin\CustomPageController@destroy')->name('admin.custom_pages.delete_page');

    Route::post('/bulk-delete-page', 'Saas\Admin\CustomPageController@bulkDestroy')->name('admin.custom_pages.bulk_delete_page');
  });
  // custom-pages route end


    // language management route start
    Route::prefix('/admin/language-management')->group(function () {
      Route::get('', 'Saas\Admin\LanguageController@index')->name('admin.language_management');
  
      Route::post('/store-language', 'Saas\Admin\LanguageController@store')->name('admin.language_management.store_language');
  
      Route::post('/{id}/make-default-language', 'Saas\Admin\LanguageController@makeDefault')->name('admin.language_management.make_default_language');
  
      Route::post('/update-language', 'Saas\Admin\LanguageController@update')->name('admin.language_management.update_language');
  
      Route::get('/{id}/edit-keyword', 'Saas\Admin\LanguageController@editKeyword')->name('admin.language_management.edit_keyword');
  
      Route::post('/{id}/update-keyword', 'Saas\Admin\LanguageController@updateKeyword')->name('admin.language_management.update_keyword');
  
      Route::post('/{id}/delete-language', 'Saas\Admin\LanguageController@destroy')->name('admin.language_management.delete_language');
  
      Route::get('/{id}/check-rtl', 'Saas\Admin\LanguageController@checkRTL');
    });
    });

    // language management route end
  

  //   Route::post('/payment/callback', function (Request $request) {
  //     // Handle callback logic here
  //     \Log::emergency($request->input());
  //     dd(555);
   
  // });
    Route::get('/payment/callback', function (Request $request) {
      // Handle callback logic here
      \Log::emergency(5555);
      dd(555);
   
  });