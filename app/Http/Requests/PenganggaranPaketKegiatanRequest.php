<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenganggaranPaketKegiatanRequest extends FormRequest
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
            'nama_paket' => 'required',
            'nilai_paket' => 'required|numeric',
            'lokasi_paket' => 'required',
            'volume_paket' => 'required|numeric',
            'satuan' => 'required',
            'id_sumber_dana' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nama_paket' => __('Nama Paket'),
            'nilai_paket' => __('Nilai Paket'),
            'lokasi_paket' => __('Lokasi'),
            'volume_paket' => __('Volume'),
            'satuan' => __('Satuan'),
            'id_sumber_dana' => __('Sumber Dana'),
        ];
    }
}
