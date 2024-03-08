<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
{
    public function authorize()
    {
        
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:technologies,name,' . $this->route('technology') . '|max:255',
        ];
    }
}
