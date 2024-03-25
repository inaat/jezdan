<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Models\HomePage\NewsletterSection;
use App\Models\Language;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
  public function index(Request $request)
  {
    $language = Language::where('code', $request->language)->first();
    $information['language'] = $language;

    $information['data'] = $language->newsletterSec()->first();

    $information['langs'] = Language::all();

    $information['themeInfo'] = DB::table('basic_settings')->select('theme_version')->first();

    return view('saas.admin.home-page.newsletter-section', $information);
  }

  public function update(Request $request)
  {
    $language = Language::where('code', $request->language)->first();

    $newsletterInfo = $language->newsletterSec()->first();

    $themeInfo = DB::table('basic_settings')->select('theme_version')->first();

    $rules = [];

    if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 3) {
      if (empty($newsletterInfo->background_image)) {
        $rules['background_image'] = 'required';
      }
      if ($request->hasFile('background_image')) {
        $rules['background_image'] = new ImageMimeTypeRule();
      }
    }

    if ($themeInfo->theme_version == 1) {
      if (empty($newsletterInfo->image)) {
        $rules['image'] = 'required';
      }
      if ($request->hasFile('image')) {
        $rules['image'] = new ImageMimeTypeRule();
      }
    }

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    // store data in db start
    if (empty($newsletterInfo)) {
      if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 3) {
        $backgroundImageName = UploadFile::store('./assets/saas/admin/img/newsletter-section/', $request->file('background_image'));
      }

      if ($themeInfo->theme_version == 1) {
        $imageName = UploadFile::store('./assets/saas/admin/img/newsletter-section/', $request->file('image'));
      }

      NewsletterSection::create($request->except('language_id', 'background_image', 'image') + [
        'language_id' => $language->id,
        'background_image' => isset($backgroundImageName) ? $backgroundImageName : NULL,
        'image' => isset($imageName) ? $imageName : NULL
      ]);

      $request->session()->flash('success', 'Information added successfully!');

      return redirect()->back();
    } else {
      if ($themeInfo->theme_version == 1 || $themeInfo->theme_version == 3) {
        if ($request->hasFile('background_image')) {
          $backgroundImageName = UploadFile::update('./assets/saas/admin/img/newsletter-section/', $request->file('background_image'), $newsletterInfo->background_image);
        }
      }

      if ($themeInfo->theme_version == 1) {
        if ($request->hasFile('image')) {
          $imageName = UploadFile::update('./assets/saas/admin/img/newsletter-section/', $request->file('image'), $newsletterInfo->image);
        }
      }

      $newsletterInfo->update($request->except('background_image', 'image') + [
        'background_image' => isset($backgroundImageName) ? $backgroundImageName : $newsletterInfo->background_image,
        'image' => isset($imageName) ? $imageName : $newsletterInfo->image
      ]);

      $request->session()->flash('success', 'Information updated successfully!');

      return redirect()->back();
    }
  }
}
