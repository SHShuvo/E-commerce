<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressOptionsStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'addr1'=> 'required',
            'addr2'=> 'required',
            'city'=> 'required',
            'postcode'=> 'required',
            'country'=> 'required',
        ];
    }
}
