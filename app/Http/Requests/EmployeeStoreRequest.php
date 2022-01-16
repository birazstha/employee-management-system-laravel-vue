<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'first_name'=>['required'],
            'last_name'=>['required'],
            'address'=>['required'],
            'zip_code'=>['required'],
            'country_id'=>['required'],
            'city_id'=>['required'],
            'department_id'=>['required'],
            'state_id'=>['required'],
            'date_hired'=>['required'],
            'birthdate'=>['required'],
        ];
    }
}
