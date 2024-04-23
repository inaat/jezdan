<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

use App\Models\BasicSettings\SocialMedia;
use App\Models\HomePage\Section;
use App\Models\Journal\Blog;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
     //\Laravel\Passport\Passport::ignoreMigrations();

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

       if (get_static_option('site_force_ssl_redirection') === 'on'){
            URL::forceScheme('https');
        }

  
        $data = DB::table('basic_settings')->select('favicon', 'website_title', 'logo')->first();
    
    
        // send this information to only back-end view files
        View::composer('saas.admin.*', function ($view) {
          if (Auth::guard('admin')->check() == true) {
            $authAdmin = Auth::guard('admin')->user();
            $role = null;
    
            if (!is_null($authAdmin->role_id)) {
              $role = $authAdmin->role()->first();
            }
          }
    
          $language = Language::where('is_default', 1)->first();
    
          $websiteSettings = DB::table('basic_settings')->select('admin_theme_version')->first();
    
          $footerText = $language->footerContent()->first();
    
          if (Auth::guard('admin')->check() == true) {
            $view->with('roleInfo', $role);
          }
    
          $view->with('defaultLang', $language);
          $view->with('settings', $websiteSettings);
          $view->with('footerTextInfo', $footerText);
        });
        // send this information to only front-end view files
        View::composer('saas.front.*', function ($view) {
          // get basic info
          $basicData = DB::table('basic_settings')->select('theme_version', 'footer_logo', 'primary_color', 'secondary_color', 'breadcrumb_overlay_color', 'breadcrumb_overlay_opacity', 'email_address', 'contact_number', 'address', 'latitude', 'longitude')->first();
    
          // get all the languages of this system
          $allLanguages = Language::all();
    
          // get the current locale of this website
          if (Session::has('currentLocaleCode')) {
            $locale = Session::get('currentLocaleCode');
          }
          if (empty($locale)) {
            $language = Language::where('is_default', 1)->first();
          } else {
            $language = Language::where('code', $locale)->first();
            if (empty($language)) {
              $language = Language::where('is_default', 1)->first();
            }
          }
    
          // get all the social medias
          $socialMedias = SocialMedia::orderBy('serial_number')->get();
    
          // get the menus of this website
          $siteMenuInfo = $language->menuInfo;
    
          if (is_null($siteMenuInfo)) {
            $menus = json_encode([]);
          } else {
            $menus = $siteMenuInfo->menus;
          }
          
          // get the announcement popups
          $popups = $language->announcementPopup()->where('status', 1)->orderBy('serial_number', 'asc')->get();
    
          // get the cookie alert info
          $cookieAlert = $language->cookieAlertInfo()->first();
           //dd($cookieAlert);
          // get footer section status (enable/disable) information
          $footerSectionStatus = Section::query()->pluck('footer_section_status')->first();
    
          //if ($footerSectionStatus == 1) {
            // get the footer info
            $footerData = $language->footerContent()->first();
    
            // get the quick links of footer
            $quickLinks = $language->footerQuickLink()->orderBy('serial_number', 'asc')->get();
         // get latest blogs
              $blogs = Blog::join('blog_informations', 'blogs.id', '=', 'blog_informations.blog_id')
                ->where('blog_informations.language_id', '=', $language->id)
                ->select('blogs.image', 'blogs.created_at', 'blog_informations.title', 'blog_informations.slug')
                ->orderByDesc('blogs.created_at')
                ->limit(3)
                ->get();
       
    
    
          //   // get newsletter title
           $newsletterTitle = $language->newsletterSec()->pluck('title')->first();
      
          $view->with('basicInfo', $basicData);
          $view->with('allLanguageInfos', $allLanguages);
          $view->with('currentLanguageInfo', $language);
          $view->with('socialMediaInfos', $socialMedias);
          $view->with('menuInfos', $menus);
          $view->with('popupInfos', $popups);
          $view->with('cookieAlertInfo', $cookieAlert);
          $view->with('footerSecStatus', $footerSectionStatus);
    
            $view->with('footerInfo', $footerData);
            $view->with('quickLinkInfos', $quickLinks);
    
          
               $view->with('latestBlogInfos', $blogs);
             
    
              $view->with('newsletterTitle', $newsletterTitle);
            
          
        });
    
    
        // send this information to both front-end & back-end view files
        View::share(['websiteInfo' => $data]);









    }
}
