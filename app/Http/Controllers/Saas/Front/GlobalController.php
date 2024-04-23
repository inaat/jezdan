<?php

namespace App\Http\Controllers\Saas\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Global\City;
use App\Models\Global\State;

class GlobalController extends Controller
{
 
    public function getStates(Request $request){
        if (!empty($request->input('country_id'))) {
            $country_id = $request->input('country_id');
            
            // $system_settings_id = session()->get('user.system_settings_id');
            $sates = State::forDropdown(false,$country_id);
            $html = '<option value="">' . __('english.please_select') . '</option>';
            //$html = '';
            if (!empty($sates)) {
                foreach ($sates as $id => $name) {
                    $html .= '<option value="' . $id .'">' . $name. '</option>';
                }
            }

            return $html;
        }

    }
    public function getCities(Request $request){
        if (!empty($request->input('country_id'))) {
            $country_id = $request->input('country_id');
            $state_id = $request->input('state_id');
            
            // $system_settings_id = session()->get('user.system_settings_id');
            $cities = City::forDropdown(false,$country_id,$state_id);
            $html = '<option value="">' . __('english.please_select') . '</option>';
            //$html = '';
            if (!empty($cities)) {
                foreach ($cities as $id => $name) {
                    $html .= '<option value="' . $id .'">' . $name. '</option>';
                }
            }

            return $html;
        }

    }
}
