<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'date' => 'required|date',
            'tour' => 'required|string',
            'wni' => 'required',
            'wna' => 'required',
        ];

        $data = parent::all();
        if($data['wni']==0 && $data['wna']==0){
            unset($rules['wni']);
            unset($rules['wna']);
            $rules = array_add($rules, 'wni', 'required|numeric|min:1');
            $rules = array_add($rules, 'wna', 'required|numeric|min:1');
        }

        return $rules;
    }

    public function all($keys = null)
    {
        $data = parent::all();
        $data['order'] = $data['tour'];

        return $data;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute harus di isi',
            'min' => ':attribute minimal harus 1 orang',
        ];
    }

    public function attributes()
    {
        return[
            'wni' => 'Jumlah turis lokal', //This will replace any instance of 'username' in validation messages with 'email'
            'wna' => 'Jumlah turis asing', //This will replace any instance of 'username' in validation messages with 'email'
            'tahun_pembuatan' => 'year built', //This will replace any instance of 'username' in validation messages with 'email'
            //'anyinput' => 'Nice Name',
        ];

    }
}
