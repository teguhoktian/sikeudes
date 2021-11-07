<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RPJMDKegiatanRequest extends FormRequest
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
            'id_kegiatan' => 'required',
            'id_sasaran' => 'required',
            'lokasi' => 'required|max:100',
            'keluaran' => 'required|max:100'
        ];
    }

    public function attributes()
    {
        return [
            'id_kegiatan' => __('Kegiatan'),
            'id_sasaran' => __('Sasaran Kegiatan'),
            'lokasi' => __('Lokasi Kegiatan'),
            'keluaran' => __('Keluaran')
        ];
    }
}
