<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenganggaranKegiatanRequest extends FormRequest
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
            'id_pelaksana' => 'required',
            'waktu_pelaksanaan' => 'required',
            'lokasi' => 'required|max:100',
            'pagu' => 'required|numeric',
            'volume' => 'required|numeric',
            'satuan' => 'required',
            'keluaran' => 'required|max:100'
        ];
    }

    public function attributes()
    {
        return [
            'id_kegiatan' => __('Kegiatan'),
            'id_pelaksana' => __('Pelaksana Kegiatan'),
            'lokasi' => __('Lokasi Kegiatan'),
            'waktu_pelaksanaan' => __('Waktu Pelaksanaan Kegiatan'),
            'pagu' => __('Pagu Kegiatan'),
            'volume' => __('Volume Kegiatan'),
            'satuan' => __('Satuan Kegiatan'),
            'keluaran' => __('Keluaran')
        ];
    }
}
