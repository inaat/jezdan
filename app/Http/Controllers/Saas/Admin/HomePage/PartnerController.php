<?php

namespace App\Http\Controllers\Saas\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadFile;
use App\Models\HomePage\HeroSection;
use App\Models\Language;
use App\Models\HomePage\Partner;
use App\Rules\ImageMimeTypeRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Partner\StoreRequest;
use App\Http\Requests\Partner\UpdateRequest;

class PartnerController extends Controller
{

    public function index(Request $request)
    {
      $language = Language::where('code', $request->language)->first();
      $information['language'] = $language;


      $information['partners'] = $language->partnerSec()->get();
  
      $information['langs'] = Language::all();
  
  
      return view('saas.admin.home-page.partners-section.partners', $information);
    }

    
  public function store(StoreRequest $request)
  {
    $imageName = UploadFile::store('./assets/saas/admin/img/partners/', $request->file('image'));

    Partner::create($request->except('image') + [
      'image' => $imageName
    ]);

    $request->session()->flash('success', 'New partner added successfully!');

    return response()->json(['status' => 'success'], 200);
  }

  public function update(UpdateRequest $request)
  {
    $partner = Partner::find($request->id);

    if ($request->hasFile('image')) {
      $imageName = UploadFile::update('./assets/saas/admin/img/partners/', $request->file('image'), $partner->image);
    }

    $partner->update($request->except('image') + [
      'image' => $request->hasFile('image') ? $imageName : $partner->image
    ]);

    $request->session()->flash('success', 'Partner updated successfully!');

    return response()->json(['status' => 'success'], 200);
  }

  public function destroy($id)
  {
    $partner = Partner::find($id);

    // delete client picture
    @unlink('assets/saas/admin/img/partners/' . $partner->image);

    $partner->delete();

    return redirect()->back()->with('success', 'Partner deleted successfully!');
  }
}
