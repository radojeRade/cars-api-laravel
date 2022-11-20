<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
        return 
            [
                'brand' => 'required|min:2',
                'model' => 'required|min:2',
                'year' => 'required|numeric',
                'maxSpeed' => 'numeric|between:20,300',
                'isAutomatic' => 'boolean',
                'engine' => 'required',
                'numberOfDoors' => 'numeric|between:2,5',
            ];
        
    }
}
