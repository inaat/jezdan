<?php

namespace App\Models\Global;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
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
    protected $table_name='countries';
   /**
     * Return list of ClassLevels for a business
     *
     * @param boolean $show_none = false
     *
     * @return array
     */
    public static function forDropdown($show_none=null)
    {
        $query=Country::orderBy('id', 'asc');

        return  $query->get();
    }
}
