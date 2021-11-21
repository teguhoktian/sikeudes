<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenganggaranPembiayaanBelanjaRequest extends FormRequest
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
            'id_sumber_dana' => 'required',
            'id_rekening_objek' => 'required',
            'uraian' => 'required',
            'harga_satuan' => 'required|numeric',
            'volume' => 'required|numeric',
            'satuan' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'id_sumber_dana' => __('Sumber Dana'),
            'id_rekening_objek' => __('Kode Rekening'),
            'uraian' => __('Uraian'),
            'harga_satuan' => __('Pagu Kegiatan'),
            'volume' => __('Volume Kegiatan'),
            'satuan' => __('Satuan Kegiatan')
        ];
    }
}
