<?php

namespace App\Http\Controllers\Saas\Front;

use App\Http\Controllers\Controller;
use App\Models\BasicSettings\Basic;
use App\Models\HomePage\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PackageFeature;
use App\Models\Journal\Blog;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
  public function index()
  {
    
    // dd(Hash::make('123456789'));
 

    $language = $this->getLanguage();

    $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_home', 'meta_description_home')->first();

    // get the sections of selected home version
    $sectionInfo = Section::first();
    $queryResult['secInfo'] = $sectionInfo;

    $queryResult['heroInfo'] = $language->heroSec()->first();

    $queryResult['secTitleInfo'] = $language->sectionTitle()->first();
    $queryResult['secTitleInfo'] = $language->sectionTitle()->first();

    $queryResult['months_packages']  = Package::where('interval','months')->orderBy('serial_number', 'asc')->get();
    $queryResult['years_packages']  = Package::where('interval','years')->orderBy('serial_number', 'asc')->get();
    $queryResult['life_time_packages']  = Package::where('interval','life_time')->orderBy('serial_number', 'asc')->get();
    $features = PackageFeature::get();
    $features_formatted = [];
    foreach ($features as $features) {
            $features_formatted[$features->id] = $features->name;
        
    }
    $queryResult['packageFeatures'] =$features_formatted;
    if ($sectionInfo->call_to_action_section_status == 1) {
      $queryResult['callToActionInfo'] = $language->actionSec()->first();
    }

 

    $queryResult['currencyInfo'] = $this->getCurrencyInfo();

    if ($sectionInfo->features_section_status == 1) {

      $queryResult['features'] = $language->feature()->orderBy('serial_number', 'asc')->get();
    }
    $queryResult['partners']= $language->partnerSec()->orderBy('serial_number', 'asc')->get();

    if ($sectionInfo->video_section_status == 1) {
      $queryResult['videoData'] = $language->videoSec()->first();
    }

    // if ($sectionInfo->work_process_status == 1) {

      $queryResult['workProcessInfos'] = $language->workProcessInfo()->orderBy('serial_number', 'asc')->get();
    // }

    if ($sectionInfo->testimonials_section_status == 1) {
      $queryResult['testimonialData'] = Basic::select('testimonials_section_image')->first();

      $queryResult['testimonials'] = $language->testimonial()->orderBy('serial_number', 'asc')->get();
    }

    if ($sectionInfo->newsletter_section_status == 1) {
      $queryResult['newsletterData'] = $language->newsletterSec()->first();
    }

 

    if ($sectionInfo->about_us_section_status == 1) {
      $queryResult['aboutUsInfo'] = $language->aboutUsSec()->first();
    }

    if ($sectionInfo->latest_blog_section_status == 1) {
      $queryResult['blogs'] = Blog::join('blog_informations', 'blogs.id', '=', 'blog_informations.blog_id')
        ->join('blog_categories', 'blog_categories.id', '=', 'blog_informations.blog_category_id')
        ->where('blog_informations.language_id', '=', $language->id)
        ->select('blogs.image', 'blog_informations.author', 'blog_informations.title','blog_informations.content', 'blog_informations.slug', 'blog_categories.name AS categoryName','blogs.created_at','blog_categories.slug AS categorySlug')
        ->orderByDesc('blogs.created_at')
        ->limit(3)
        ->get();
    }
      return view('saas.front.index', $queryResult);
   
  }
  public function checkUsername(Request $request, $username)
  {
      // Check if the username exists in the "users" table
      $isUsernameAvailable = User::where('username', $username)->first();
     if(!empty($isUsernameAvailable)){
      $isUsernameAvailable=true;
     }else{
      $isUsernameAvailable=false;
     }
      
      return response()->json($isUsernameAvailable);
  }
}
