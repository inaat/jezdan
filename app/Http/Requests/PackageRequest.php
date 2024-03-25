<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => [
        'required'      ],
      "price" =>'required|numeric',
      "campuses_count" =>'required|numeric',
      "student_count" =>'required|numeric',
      "trial_days" => 'required|numeric',
      "interval_count" => 'required|numeric',
      "serial_number" => 'required|numeric',
      "features" => 'required|array',
      "description" =>'required',
      "interval" =>'required',
      "status" =>'required'
    ];
  }


}
