<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RPJMDDanaIndikatifRequest extends FormRequest
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
            'id_rpjmd_tahun_kegiatan' => 'required',
            'lokasi' => 'required',
            'volume' => 'required|numeric',
            'satuan' => 'required',
            'id_pelaksana_kegiatan' => 'required',
            'id_sumber_dana' => 'required',
            'waktu' => 'required',
            'biaya' => 'required|numeric',
            'mulai' => 'required|date_format:Y-m-d',
            'selesai' => 'required|date_format:Y-m-d',
        ];
    }

    public function attributes()
    {
        return [
            'id_rpjmd_tahun_kegiatan' => __('Tahun Kegiatan'),
            'lokasi' => __('Lokasi'),
            'volume' => __('Volume'),
            'satuan' => __('Satuan'),
            'id_pelaksana_kegiatan' => __('Pelaksana Kegiatan'),
            'id_sumber_dana' => __('Sumber Dana'),
            'waktu' => __('Jangka Waktu'),
            'mulai' => __('Tanggal Mulai'),
            'selesai' => __('Tanggal Selesai'),
        ];
    }
}
