<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerencanaanVisiRequest extends FormRequest
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
            'uraian' => 'required',
            'tahun_awal' => 'required|numeric',
            'tahun_akhir' => 'required|numeric',
            'kode' => 'required|max:2'
        ];
    }

    public function attributes()
    {
        return [
            'uraian' => __('Uraian'),
            'tahun_awal' => __('Tahun Awal'),
            'tahun_akhir' => __('Tahun Akhir'),
            'kode' => __('Kode')
        ];
    }
}
