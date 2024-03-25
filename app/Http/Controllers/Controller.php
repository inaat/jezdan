<?php

namespace App\Http\Controllers;

use App\Models\HomePage\Advertisement;
use App\Models\BasicSettings\Basic;
use App\Models\BasicSettings\PageHeading;
use App\Models\Language;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use App\Libraries\Mypdf;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function getCurrencyInfo()
  {
    $baseCurrencyInfo = Basic::select('base_currency_symbol', 'base_currency_symbol_position', 'base_currency_text', 'base_currency_text_position', 'base_currency_rate')
      ->firstOrFail();

    return $baseCurrencyInfo;
  }


  public function getLanguage()
  {
    // get the current locale of this system
    if (Session::has('currentLocaleCode')) {
      $locale = Session::get('currentLocaleCode');
    }
    if (empty($locale)) {
      $language = Language::where('is_default', 1)->first();
    } else {
      $language = Language::where('code', $locale)->first();
      if (empty($language)) {
        $language = Language::where('is_default', 1)->firstOrFail();
      }
    }

    return $language;
  }


  public function getPageHeading($language)
  {
     if (URL::current() == Route::is('blogs')) {
      $pageHeading = PageHeading::where('language_id', $language->id)->select('blog_page_title')->first();
    } else if (URL::current() == Route::is('blog_details')) {
      $pageHeading = PageHeading::where('language_id', $language->id)->select('blog_details_page_title')->first();
    } else if (URL::current() == Route::is('faqs')) {
      $pageHeading = PageHeading::where('language_id', $language->id)->select('faq_page_title')->first();
    } else if (URL::current() == Route::is('contact')) {
      $pageHeading = PageHeading::where('language_id', $language->id)->select('contact_page_title')->first();
    } else if (URL::current() == Route::is('user.login')) {
      $pageHeading = PageHeading::where('language_id', $language->id)->select('login_page_title')->first();
    } else if (URL::current() == Route::is('user.forget_password')) {
      $pageHeading = PageHeading::where('language_id', $language->id)->select('forget_password_page_title')->first();
    } else if (URL::current() == Route::is('user.signup')) {
      $pageHeading = PageHeading::where('language_id', $language->id)->select('signup_page_title')->first();
    }

   return $pageHeading;
  }


  public static function getBreadcrumb()
  {
    $breadcrumb = Basic::select('breadcrumb')->firstOrFail();

    return $breadcrumb;
  }


  public function changeLanguage(Request $request)
  {
    // put the selected language in session
    $langCode = $request['lang_code'];

    $request->session()->put('currentLocaleCode', $langCode);

    return redirect()->back();
  }


  public function serviceUnavailable()
  {
    $info = DB::table('basic_settings')->select('maintenance_img', 'maintenance_msg')->first();

    return view('tenant.errors.503', compact('info'));
  }


  public function countAdView($id)
  {
    // try {
    //   $ad = Advertisement::findOrFail($id);

    //   $ad->update([
    //     'views' => $ad->views + 1
    //   ]);

    //   return response()->json(['success' => 'Advertisement view counted successfully.']);
    // } catch (ModelNotFoundException $e) {
    //   return response()->json(['error' => 'Sorry, something went wrong!']);
    // }
  }


  public function storeSubscriber(Request $request)
  {
    $rules = [
      'email' => 'required|email:rfc,dns|unique:subscribers'
    ];

    $messages = [
      'email.required' => 'Please enter your email address.',
      'email.unique' => 'This email address is already exist!'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return Response::json([
        'error' => $validator->getMessageBag()
      ], 200);
    }
    Subscriber::create(['email'=>$request->email]);

    return Response::json([
      'success' => 'You have successfully subscribed to our newsletter.'
    ], 200);
  }



  

  public function reportPDF($stylesheet=null, $data=null, $viewpath= null, $mode = 'view', $pagesize = 'a4', $pagetype='portrait')
  {
      $designType = 'LTR';
      $this->data['panel_title'] = '222';
      $html = view($viewpath)->with(compact('data'))->render();
      $my_pdf = new Mypdf();
      $my_pdf->folder('uploads/report/');
      $my_pdf->filename('Report');
      $my_pdf->paper($pagesize, $pagetype);
      $my_pdf->html($html);
     // dd(url('assets/pdf/'.$designType.'/'.$stylesheet));
      if (!empty($stylesheet)) {
          $stylesheet = file_get_contents(url('tenant/assets/pdf/'.$designType.'/'.$stylesheet));
          return $my_pdf->create($mode, $this->data['panel_title'], $stylesheet);
      } else {
          return $my_pdf->create($mode, $this->data['panel_title']);
      }
  }

  public function getMpdf()
  {
      return new \Mpdf\Mpdf(['tempDir' => public_path('uploads/temp'),
          'mode' => 'utf-8',
          'autoScriptToLang' => true,
          'autoLangToFont' => true,
          'autoVietnamese' => true,
          'autoArabic' => true,
          'format' => 'A4',
          //'orientation' => 'L',
          'useSubstitutions' => true,
              'default_font_size' => 0,     // font size - default 0
              'default_font' => '',    // default font family
              'margin_left' => 0,    	// 15 margin_left
              'margin_right' => 0,    	// 15 margin right
              'mgt' => 0,     // 16 margin top
              'mgb' =>0,    	// margin bottom
              'margin_header' => 5,     // 9 margin header
              'margin_footer' => '10mm',     // 9 margin footer
              'font_path' => base_path('storage/fonts/'),
  'font_data' => [


      'cairo-black'=>[
          'R'=>'/Cairo/Cairo-Black.ttf',

       ],
      'cairo-bold'=>[
          'R'=>'/Cairo/Cairo-Bold.ttf',

      ],
      'cairo-extra-light'=>[
          'R'=>'/Cairo/Cairo-ExtraLight.ttf',

      ],
      'cairo-light'=>[
          'R'=>'/Cairo/Cairo-Light.ttf',

      ],
      'cairo'=>[
          'R'=>'/Cairo/Cairo-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'cairo-semi-bold'=>[
          'R'=>'/Cairo/Cairo-SemiBold.ttf',
      ],
      'ranchers'=>[
          'R'=>'/Ranchers/Ranchers-Regular.ttf',
      ],
      'open-sans'=>[
          'R'=>'/Open-Sans/OpenSans-Regular.ttf',
      ],
      'open-sans-bold'=>[
          'R'=>'/Open-Sans/OpenSans-Bold.ttf',
      ],
      'open-sans-bold-italic'=>[
          'R'=>'/Open-Sans/OpenSans-BoldItalic.ttf',
      ],
      'open-sans-extra-bold'=>[
          'R'=>'/Open-Sans/OpenSans-ExtraBold.ttf',
      ],
      'open-sans-semi-bold'=>[
          'R'=>'/Open-Sans/OpenSans-SemiBold.ttf',

      ],
      'open-sans-light'=>[
          'R'=>'/Open-Sans/OpenSans-Light.ttf',

      ],
      'redressed'=>[
          'R'=>'/Redressed/Redressed-Regular.ttf',

      ],
      'lato-black'=>[
          'R'=>'/Lato/Lato-Black.ttf',

      ],
      'lato-bold'=>[
          'R'=>'/Lato/Lato-Bold.ttf',

      ],
      'lato'=>[
          'R'=>'/Lato/Lato-Regular.ttf',

      ],
      'lato-thin'=>[
          'R'=>'/Lato/Lato-Thin.ttf',

      ],
      'amiri'=>[
          'R'=>'/Amiri/Amiri-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'amiri-bold'=>[
          'R'=>'/Amiri/Amiri-Bold.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'amiri-bold-italic'=>[
          'R'=>'/Amiri/Amiri-BoldItalic.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'amiri-italic'=>[
          'R'=>'/Amiri/Amiri-Italic.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],

      'janna'=>[
          'R'=>'/Janna/JannaLT-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'aref'=>[
          'R'=>'/Aref_Ruqaa/ArefRuqaa-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],

      'tajawal'=>[
          'R'=>'/Tajawal/Tajawal-Regular.ttf',

      ],
      'markazi'=>[
          'R'=>'/Markazi/Markazi-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'elmessiri'=>[
          'R'=>'/El_Messiri/ElMessiri-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'mada'=>[
          'R'=>'/Mada/Mada-Regular.ttf',
      ],
      'lemonada'=>[
          'R'=>'/Lemonada/Lemonada-Regular.ttf',

      ],
      'lateef'=>[
          'R'=>'/Lateef/Lateef-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'kufam'=>[
          'R'=>'/Kufam/Kufam-Regular.ttf',

      ],
      'jomhuria'=>[
          'R'=>'/Jomhuria/Jomhuria-Regular.ttf',

      ],
      'changa'=>[
          'R'=>'/Changa/Changa-Regular.ttf',

      ],

  ]
      ]);Mpdf\Mpdf(['tempDir' => public_path('uploads/temp'),
          'mode' => 'utf-8',
          'autoScriptToLang' => true,
          'autoLangToFont' => true,
          'autoVietnamese' => true,
          'autoArabic' => true,
          'format' => 'A4',
          //'orientation' => 'L',
          'useSubstitutions' => true,
              'default_font_size' => 0,     // font size - default 0
              'default_font' => '',    // default font family
              'margin_left' => 0,    	// 15 margin_left
              'margin_right' => 0,    	// 15 margin right
              'mgt' => 0,     // 16 margin top
              'mgb' =>0,    	// margin bottom
              'margin_header' => 5,     // 9 margin header
              'margin_footer' => '10mm',     // 9 margin footer
              'font_path' => base_path('storage/fonts/'),
  'font_data' => [


      'cairo-black'=>[
          'R'=>'/Cairo/Cairo-Black.ttf',

       ],
      'cairo-bold'=>[
          'R'=>'/Cairo/Cairo-Bold.ttf',

      ],
      'cairo-extra-light'=>[
          'R'=>'/Cairo/Cairo-ExtraLight.ttf',

      ],
      'cairo-light'=>[
          'R'=>'/Cairo/Cairo-Light.ttf',

      ],
      'cairo'=>[
          'R'=>'/Cairo/Cairo-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'cairo-semi-bold'=>[
          'R'=>'/Cairo/Cairo-SemiBold.ttf',
      ],
      'ranchers'=>[
          'R'=>'/Ranchers/Ranchers-Regular.ttf',
      ],
      'open-sans'=>[
          'R'=>'/Open-Sans/OpenSans-Regular.ttf',
      ],
      'open-sans-bold'=>[
          'R'=>'/Open-Sans/OpenSans-Bold.ttf',
      ],
      'open-sans-bold-italic'=>[
          'R'=>'/Open-Sans/OpenSans-BoldItalic.ttf',
      ],
      'open-sans-extra-bold'=>[
          'R'=>'/Open-Sans/OpenSans-ExtraBold.ttf',
      ],
      'open-sans-semi-bold'=>[
          'R'=>'/Open-Sans/OpenSans-SemiBold.ttf',

      ],
      'open-sans-light'=>[
          'R'=>'/Open-Sans/OpenSans-Light.ttf',

      ],
      'redressed'=>[
          'R'=>'/Redressed/Redressed-Regular.ttf',

      ],
      'lato-black'=>[
          'R'=>'/Lato/Lato-Black.ttf',

      ],
      'lato-bold'=>[
          'R'=>'/Lato/Lato-Bold.ttf',

      ],
      'lato'=>[
          'R'=>'/Lato/Lato-Regular.ttf',

      ],
      'lato-thin'=>[
          'R'=>'/Lato/Lato-Thin.ttf',

      ],
      'amiri'=>[
          'R'=>'/Amiri/Amiri-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'amiri-bold'=>[
          'R'=>'/Amiri/Amiri-Bold.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'amiri-bold-italic'=>[
          'R'=>'/Amiri/Amiri-BoldItalic.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'amiri-italic'=>[
          'R'=>'/Amiri/Amiri-Italic.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],

      'janna'=>[
          'R'=>'/Janna/JannaLT-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'aref'=>[
          'R'=>'/Aref_Ruqaa/ArefRuqaa-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],

      'tajawal'=>[
          'R'=>'/Tajawal/Tajawal-Regular.ttf',

      ],
      'markazi'=>[
          'R'=>'/Markazi/Markazi-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'elmessiri'=>[
          'R'=>'/El_Messiri/ElMessiri-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,
      ],
      'mada'=>[
          'R'=>'/Mada/Mada-Regular.ttf',
      ],
      'lemonada'=>[
          'R'=>'/Lemonada/Lemonada-Regular.ttf',

      ],
      'lateef'=>[
          'R'=>'/Lateef/Lateef-Regular.ttf',
          'useOTL' => 0xFF,
          'useKashida' => 75,

      ],
      'kufam'=>[
          'R'=>'/Kufam/Kufam-Regular.ttf',

      ],
      'jomhuria'=>[
          'R'=>'/Jomhuria/Jomhuria-Regular.ttf',

      ],
      'changa'=>[
          'R'=>'/Changa/Changa-Regular.ttf',

      ],

  ]
      ]);
  }
}
