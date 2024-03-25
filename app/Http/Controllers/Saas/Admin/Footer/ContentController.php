<?php

namespace App\Http\Controllers\Saas\Admin\Footer;

use App\Http\Controllers\Controller;
use App\Models\Footer\FooterContent;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class ContentController extends Controller
{
  public function index(Request $request)
  {
    // first, get the language info from db
    $language = Language::where('code', $request->language)->first();
    $information['language'] = $language;

    // then, get the footer content info of that language from db
    $information['data'] = FooterContent::where('language_id', $language->id)->first();

    // also, get all the languages from db
    $information['langs'] = Language::all();

    $information['themeInfo'] = DB::table('basic_settings')->select('theme_version')->first();

    return view('saas.admin.footer.content', $information);
  }

  public function update(Request $request)
  {
    $themeInfo = DB::table('basic_settings')->select('theme_version')->first();

    $rules = [
      'footer_background_color' => 'required',
      'about_company' => function ($attribute, $value, $fail) use ($themeInfo) {
        if ($themeInfo->theme_version == 1 && $value === null) {
          $fail('The ' . str_replace('_', ' ', $attribute) . ' field is required.');
        }
      },
      'copyright_background_color' => function ($attribute, $value, $fail) use ($themeInfo) {
        if ($themeInfo->theme_version == 2 && $value === null) {
          $fail('The ' . str_replace('_', ' ', $attribute) . ' field is required.');
        }
      },
      'copyright_text' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }

    // first, get the language info from db
    $language = Language::where('code', $request->language)->first();

    // then, get the footer content info of that language from db
    $data = FooterContent::where('language_id', $language->id)->first();

    if ($data == null) {
      // if footer content of that language does not exist then create a new one
      FooterContent::create($request->except('language_id', 'copyright_text') + [
        'language_id' => $language->id,
        'copyright_text' => Purifier::clean($request->copyright_text)
      ]);
    } else {
      // else update the existing footer content info of that language
      $data->update($request->except('copyright_text') + [
        'copyright_text' => Purifier::clean($request->copyright_text)
      ]);
    }

    $request->session()->flash('success', 'Footer content info updated successfully!');

    return Response::json(['status' => 'success'], 200);
  }
}
