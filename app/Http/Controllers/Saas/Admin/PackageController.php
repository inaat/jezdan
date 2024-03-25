<?php

namespace App\Http\Controllers\Saas\Admin;
use App\Http\Controllers\Controller;
use App\Models\PackageFeature;
use App\Models\Package;

use Illuminate\Http\Request;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $information['packages']  = Package::all();
        $features = PackageFeature::get();
        $features_formatted = [];
        foreach ($features as $features) {
                $features_formatted[$features->id] = $features->name;
            
        }
        $information['packageFeatures'] =$features_formatted;

        return view('saas.admin.package.index',$information);

    }
    public function create()
    {
        $information['packageFeatures']  = PackageFeature::all();

        return view('saas.admin.package.create',$information);

    }
    public function edit($id)
    {
        $information['package']  = Package::find($id);
        $features = PackageFeature::get();
        $features_formatted = [];
        foreach ($features as $features) {
                $features_formatted[$features->id] = $features->name;
            
        }
        $information['packageFeatures'] =$features_formatted;
        return view('saas.admin.package.edit',$information);
    }
    public function store(PackageRequest $request)
    {
      //  dd($request->input());
       try {
        
            $input = $request->only(['name', 'description', 'campuses_count', 'student_count',  'interval','interval_count', 'trial_days', 'price', 'serial_number', 'status', 'features',
                ]);


            $input['created_by'] = $request->session()->get('user.id');

          
            $package = new Package;
            $package->fill($input);
            $package->save();

           $output = redirect()->action('\App\Http\Controllers\Saas\Admin\PackageController@index')->with('success', 'Package Add successfully!');
        } catch (\Exception $e) {
            $output= redirect()->back()->with('success', 'Something went wrong!');

        }
            return $output; 

    }
    
    public function update(PackageRequest $request,$id)
    {
        try {
        
            $input = $request->only(['name', 'description', 'campuses_count', 'student_count',  'interval','interval_count', 'trial_days', 'price', 'serial_number', 'status', 'features',
                ]);


            $input['created_by'] = $request->session()->get('user.id');

          
            $package = Package::find($id);
            $package->fill($input);
            $package->save();

           $output = redirect()            ->action('\App\Http\Controllers\Saas\Admin\PackageController@index')
           ->with('success', 'Package Updated successfully!');
        } catch (\Exception $e) {
            $output= redirect()->back()->with('success', 'Something went wrong!');

        }
            return $output; 
    }
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
    
          return redirect()->back()->with('success', 'Package  deleted successfully!');
    }

}
