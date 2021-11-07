<?php

namespace App\Services;

use App\Models\PerencanaanTujuan;
use DataTables;

class PerencanaanTujuanServices{

    public function getDataTables($misi)
    {
        return Datatables::of(PerencanaanTujuan::where(['id_misi' => $misi->id])->get())
            ->addColumn('action', function ($row) {
                $button   = '<a href="' . route('tujuan.edit', ['tujuan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                $button  .= '<a href="' . route('sasaran.index', ['tujuan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-plus-circle-outline"></i> ' . __('Sasaran') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        return PerencanaanTujuan::create($request->all());
    }

    public function update($request, $tujuan)
    {
        return $tujuan->update($request->all());
    }
    
}
