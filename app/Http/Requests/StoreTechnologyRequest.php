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
            'name' => 'required|string|unique:technologies,name|max:255',
            
        ];
    }
}
