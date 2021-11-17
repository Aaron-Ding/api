<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class GuestPointUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:guest,id',
            'point' => 'required|numeric',
        ];
    }

    protected function prepareForValidation()
    {
        parent::prepareForValidation();

        $this->merge(['id' => $this->route('id')]);
    }
}
