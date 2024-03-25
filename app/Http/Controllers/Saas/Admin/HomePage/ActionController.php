<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Models\HomePage\ActionSection;
use App\Models\Language;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ActionController extends Controller
{
  public function index(Request $request)
  {
    $language = Language::where('code', $request->language)->first();
    $information['language'] = $language;

    $information['data'] = $language->actionSec()->first();

    $information['langs'] = Language::all();

    $information['themeInfo'] = DB::table('basic_settings')->select('theme_version')->first();

    return view('saas.admin.home-page.action-section', $information);
  }

  public function update(Request $request)
  {
    $language = Language::where('code', $request->language)->first();

    $actionInfo = $language->actionSec()->first();

    $themeInfo = DB::table('basic_settings')->select('theme_version')->first();

    $rules = [];

    if (empty($actionInfo)) {
      $rules['background_image'] = 'required';
    }
    if ($request->hasFile('background_image')) {
      $rules['background_image'] = new ImageMimeTypeRule();
    }

    if ($themeInfo->theme_version == 2 && $request->hasFile('image')) {
      $rules['image'] = new ImageMimeTypeRule();
    }

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    // store data in db
    if (empty($actionInfo)) {
      $backgroundImageName = UploadFile::store('./assets/saas/admin/img/action-section/', $request->file('background_image'));

      $imageName = NULL;

      if ($themeInfo->theme_version == 2 && $request->hasFile('image')) {
        $imageName = UploadFile::store('./assets/saas/admin/img/action-section/', $request->file('image'));
      }

      ActionSection::create($request->except('language_id', 'background_image', 'image') + [
        'language_id' => $language->id,
        'background_image' => $backgroundImageName,
        'image' => $imageName
      ]);

      $request->session()->flash('success', 'Information added successfully!');

      return redirect()->back();
    } else {
      if ($request->hasFile('background_image')) {
        $backgroundImageName = UploadFile::update('./assets/saas/admin/img/action-section/', $request->file('background_image'), $actionInfo->background_image);
      }

      if ($themeInfo->theme_version == 2 && $request->hasFile('image')) {
        $imageName = UploadFile::update('./assets/saas/admin/img/action-section/', $request->file('image'), $actionInfo->image);
      }

      $actionInfo->update($request->except('background_image', 'image') + [
        'background_image' => $request->hasFile('background_image') ? $backgroundImageName : $actionInfo->background_image,
        'image' => $request->hasFile('image') ? $imageName : $actionInfo->image
      ]);

      $request->session()->flash('success', 'Information updated successfully!');

      return redirect()->back();
    }
  }
}
