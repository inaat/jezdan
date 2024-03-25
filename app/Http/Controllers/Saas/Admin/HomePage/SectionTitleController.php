<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomePage\SectionTitle;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionTitleController extends Controller
{
  public function index(Request $request)
  {
    $language = Language::where('code', $request->language)->first();
    $information['language'] = $language;

    $information['data'] = $language->sectionTitle()->first();

    $information['langs'] = Language::all();

    $information['themeInfo'] = DB::table('basic_settings')->select('theme_version')->first();

    return view('saas.admin.home-page.section-titles', $information);
  }

  public function update(Request $request)
  {
    
    $language = Language::where('code', $request->language)->first();

    $titleInfo = $language->sectionTitle()->first();

    if (empty($titleInfo)) {
      SectionTitle::create($request->except('language_id') + [
        'language_id' => $language->id
      ]);

      $request->session()->flash('success', 'Section Titles added successfully!');

      return redirect()->back();
    } else {
      $titleInfo->update($request->all());

      $request->session()->flash('success', 'Section Titles updated successfully!');

      return redirect()->back();
    }
  }
}
