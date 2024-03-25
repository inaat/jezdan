<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Models\HomePage\AboutUsSection;
use App\Models\Language;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
  public function index(Request $request)
  {
    $language = Language::where('code', $request->language)->first();
    $information['language'] = $language;

    $information['data'] = $language->aboutUsSec()->first();

    $information['langs'] = Language::all();

    return view('saas.admin.home-page.about-us-section', $information);
  }

  public function update(Request $request)
  {
    $language = Language::where('code', $request->language)->first();

    $aboutUsInfo = $language->aboutUsSec()->first();


  

    // store data in db start
    if (empty($aboutUsInfo)) {

      AboutUsSection::create($request->except('language_id', 'image') + [
        'language_id' => $language->id,
      ]);

      $request->session()->flash('success', 'Information added successfully!');

      return redirect()->back();
    } else {
    
      $aboutUsInfo->update($request->all());

      $request->session()->flash('success', 'Information updated successfully!');

      return redirect()->back();
    }
  }
}
