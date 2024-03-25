<?php

namespace App\Http\Controllers\Saas\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PackageFeature;
use App\Http\Requests\PackageFeatureRequest;
class PackageFeatureController extends Controller
{
    public function index(Request $request)
    {
        $information['packageFeatures'] = PackageFeature::orderByDesc('id')->get();

        return view('saas.admin.package-feature.index',$information);

    }

    public function store(PackageFeatureRequest $request)
    {
        $ins = $request->all();
        PackageFeature::create($ins);
    
        $request->session()->flash('success', 'New package feature added successfully!');
    
        return response()->json(['status' => 'success'], 200);
       
    }
    public function update(PackageFeatureRequest $request){
        $ins = $request->all();
        PackageFeature::find($request->id)->update($ins);
    
        $request->session()->flash('success', 'Package feature updated successfully!');
    
        return response()->json(['status' => 'success'], 200);
    }
    public function destroy($id)
    {
        $packageFeature = PackageFeature::find($id);
        $packageFeature->delete();
    
          return redirect()->back()->with('success', 'Package feature deleted successfully!');
        
    }

}
