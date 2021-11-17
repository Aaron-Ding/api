<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class GuestCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|numeric'
        ];
    }
}
