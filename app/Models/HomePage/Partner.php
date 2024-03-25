<?php

namespace App\Models\HomePage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;

class Partner extends Model
{
    use HasFactory;


    
  protected $fillable = ['language_id', 'image', 'url','serial_number'];

  public function language()
  {
    return $this->belongsTo(Language::class, 'language_id', 'id');
  }
}
