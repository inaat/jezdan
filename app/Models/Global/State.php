<?php

namespace App\Models\Global;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{  use HasFactory;
    

        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
   /**
     * Return list of ClassLevels for a business
     *
     * @param boolean $show_none = false
     *
     * @return array
     */
 
    public static function forDropdown($show_none = false,$country_id)
    {
        $query=State::where('country_id',$country_id);

        

        $states=$query->orderBy('id', 'asc')
        ->pluck('name', 'id');
        if ($show_none) {
            $states->prepend(__('lang.none'), '');
        }

        return  $states;
    }

}
