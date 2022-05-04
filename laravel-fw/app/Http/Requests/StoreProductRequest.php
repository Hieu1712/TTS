<?php

namespace App\Http\Requests;
use App\Rules\MyRule;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        // return [
        //     'name' => [
        //         'required',
        //          new MyRule(),
        //     ]
        // ];
        return [
            'name' => 'required|max:99',
            'descripti' => 'required|max:350',
            'image_url' => 'mimes:jpg,png',
            'price' => 'required|Numeric',
            'quantity' => 'required|Numeric',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Không được để trống!.',
        ];
    }
}
