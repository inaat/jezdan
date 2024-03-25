<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Http\Requests\WorkProcessRequest;
use App\Models\HomePage\WorkProcess;
use App\Models\Language;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WorkProcessController extends Controller
{
  public function index(Request $request)
  {
    $language = Language::where('code', $request->language)->first();
    $information['language'] = $language;


    $information['workProcessInfos'] = $language->workProcessInfo()->orderByDesc('id')->get();

    $information['langs'] = Language::all();

    $information['themeInfo'] = DB::table('basic_settings')->select('theme_version')->first();

    return view('saas.admin.home-page.work-process-section.index', $information);
  }



  public function store(WorkProcessRequest $request)
  {
    WorkProcess::create($request->all());

    $request->session()->flash('success', 'New information added successfully!');

    return response()->json(['status' => 'success'], 200);
  }

  public function update(WorkProcessRequest $request)
  {
    WorkProcess::find($request->id)->update($request->all());

    $request->session()->flash('success', 'Information updated successfully!');

    return response()->json(['status' => 'success'], 200);
  }

  public function destroy($id)
  {
    WorkProcess::find($id)->delete();

    return redirect()->back()->with('success', 'Information deleted successfully!');
  }


}
