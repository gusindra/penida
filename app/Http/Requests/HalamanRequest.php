<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HalamanRequest extends FormRequest
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
        $rules = [
            'judul' => 'required',
            'konten' => 'required',
            'slug' => 'required',
            'tipe' => 'required',
            'image' => 'required|max:1000',
        ];
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'judul' => 'required',
                    'konten' => 'required',
                    'tipe' => 'required',
                    'image' => 'nullable|max:1000',
                ];
                break;
        }
        return $rules;
    }
}
