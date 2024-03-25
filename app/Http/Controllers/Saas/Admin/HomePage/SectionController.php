<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionStatusRequest;
use App\Models\HomePage\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
  public function index()
  {
    $sectionInfo = Section::first();

    $themeInfo = DB::table('basic_settings')->select('theme_version')->first();

    return view('saas.admin.home-page.section-customization', compact('sectionInfo', 'themeInfo'));
  }

  public function update(SectionStatusRequest $request)
  {
    $sectionInfo = Section::first();

    if (empty($sectionInfo)) {
      Section::query()->create($request->all());
    } else {
      $sectionInfo->update($request->all());
    }

    $request->session()->flash('success', 'Section status updated successfully!');

    return redirect()->back();
  }
}
