<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Models\HomePage\HeroSection;
use App\Models\Language;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HeroController extends Controller
{
  public function index(Request $request)
  {
    $language = Language::where('code', $request->language)->first();
    $information['language'] = $language;

    $information['data'] = $language->heroSec()->first();

    $information['langs'] = Language::all();

    $information['themeInfo'] = DB::table('basic_settings')->select('theme_version')->first();

    return view('saas.admin.home-page.hero-section', $information);
  }

  public function update(Request $request)
  {
    $language = Language::where('code', $request->language)->first();

    $heroInfo = $language->heroSec()->first();


    $rules = [];

    if (empty($heroInfo)) {
      $rules['image'] = 'required';
    }
    if ($request->hasFile('image')) {
      $rules['image'] = new ImageMimeTypeRule();
    }

   

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    // format video link
    $link = NULL;

    if ($request->filled('video_url')) {
      $link = $request->video_url;

      if (strpos($link, '&') != 0) {
        $link = substr($link, 0, strpos($link, '&'));
      }
    }

    // insert data into db
    if (empty($heroInfo)) {

      $imageName = NULL;

      if ( $request->hasFile('image')) {
        $imageName = UploadFile::store('./assets/saas/admin/img/hero-section/', $request->file('image'));
      }

      HeroSection::create($request->except('language_id', 'image', 'video_url') + [
        'language_id' => $language->id,
        'image' => $imageName,
        'video_url' => $link
      ]);

      $request->session()->flash('success', 'Information added successfully!');

      return redirect()->back();
    } else {
  

      if ($request->hasFile('image')) {
        $imageName = UploadFile::update('./assets/saas/admin/img/hero-section/', $request->file('image'), $heroInfo->image);
      }

      $heroInfo->update($request->except( 'image', 'video_url') + [
        'image' => $request->hasFile('image') ? $imageName : $heroInfo->image,
        'video_url' => $link
      ]);

      $request->session()->flash('success', 'Information updated successfully!');

      return redirect()->back();
    }
  }
}
