<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BureauRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return [
            'bureau.name' => 'required',
            'bureau.short_name' => 'required',
            'bureau.address' => 'nullable',
            'bureau.phone' => 'nullable',
            'bureau.email' => 'nullable',

            'logo' => 'nullable|image|max:2048'
        ];
    }
}
