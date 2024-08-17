<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{


    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'short_content' => 'required|string',
            'content' => 'required|string',
            'photo' => 'required|file|image|max:2048', // Ensure the file is an image
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Sarlavha majburiydir.',
            'title.max' => 'Sarlavha 255 ta belgidan oshmasligi kerak.',
            'short_content.required' => 'Qisqa matn yozing.',
            'content.required' => 'Maqola yozing.',
        ];
    }
}
