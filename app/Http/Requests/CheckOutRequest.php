<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'street_address' => 'required',
            'postcode_zip' => 'required',
            'town_city' => 'required',
            'email' => 'required',
            'phone'=> 'required',
            'payment_type' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Vui lòng điền họ',
            'last_name.required'  => 'Vui lòng điền tên',
            'country.required'  => 'Vui lòng điền quốc gia',
            'street_address.required'  => 'Vui lòng điền địa chỉ',
            'town_city.required'  => 'Vui lòng điền thành phố',
            'email.required'  => 'Vui lòng điền email',
            'phone.required'  => 'Vui lòng điền số điện thoại',
            'payment_type.required'  => '*',
        ];
    }
}
