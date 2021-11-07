<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelaksanaKegiatanRequest extends FormRequest
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
            'nama' => 'required|min:3|max:100',
            'jabatan' => 'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => __('Nama'),
            'jabatan' => __('Jabatan'),
        ];
    }
}
