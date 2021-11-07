<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KepalaDesaRequest extends FormRequest
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
            'tanggal_mulai_jabatan' => 'required|date_format:Y-m-d',
            'tanggal_akhir_jabatan' => 'nullable|date_format:Y-m-d',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => __('Nama'),
            'jabatan' => __('Jabatan'),
            'perdes_apbd_date' => __('Tgl Perdes APBD'),
            'tanggal_mulai_jabatan' => __('Masa Awal Jabatan'),
            'tanggal_akhir_jabatan' => __('Masa Akhir Jabatan')
        ];
    }
}
