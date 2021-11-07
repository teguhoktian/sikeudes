<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KabupatenRequest extends FormRequest
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
        return [
            'nama' => 'required|max:100',
            'kode' => 'required|size:2'
        ];
    }

    public function attributes()
    {
        return [
            'nama' => __('Nama'),
            'kode' => __('Kode')
        ];
    }
    
}
