<?php

namespace App\Services;

use App\Models\PerencanaanSasaran;
use DataTables;

class PerencanaanSasaranServices{

    public function getDataTables($tujuan)
    {
        return Datatables::of(PerencanaanSasaran::where(['id_tujuan' => $tujuan->id])->get())
            ->addColumn('action', function ($row) {
                $button   = '<a href="' . route('sasaran.edit', ['sasaran' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        return PerencanaanSasaran::create($request->all());
    }

    public function update($request, $sasaran)
    {
        return $sasaran->update($request->all());
    }
    
}
