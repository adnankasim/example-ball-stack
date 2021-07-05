<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitizenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return [
            'citizen.name' => 'required',
            'citizen.username' => 'required',
            'citizen.email' => 'required',
            'citizen.password' => 'required',
            'citizen.phone' => 'required',

            'citizen.nik' => 'required',
            'citizen.kk_number' => 'required',
            'citizen.sex' => 'required',
            'citizen.citizenship' => 'required',
            'citizen.birth_place' => 'nullable',
            'citizen.birth_date' => 'nullable',

            'photo' => 'nullable|image|max:2048',
            'ktp' => 'nullable|image|max:2048',
            'photo_with_ktp' => 'nullable|image|max:2048',
        ];
    }

    public static function updateRules()
    {
        return [
            'citizen.name' => 'required',
            'citizen.username' => 'required',
            'citizen.email' => 'required',
            'citizen.password' => 'nullable',
            'citizen.phone' => 'required',

            'citizen.kk_number' => 'required',
            'citizen.sex' => 'required',
            'citizen.citizenship' => 'required',
            'citizen.birth_place' => 'nullable',
            'citizen.birth_date' => 'nullable',

            'photo' => 'nullable|image|max:2048',
            'ktp' => 'nullable|image|max:2048',
            'photo_with_ktp' => 'nullable|image|max:2048',
        ];
    }
}
