<?php

namespace App\Services;

use App\Models\PerencanaanMisi;
use DataTables;

class PerencanaanMisiServices{

    public function getDataTables($visi)
    {
        return Datatables::of(PerencanaanMisi::where(['id_visi' => $visi->id])->get())
            ->addColumn('action', function ($row) {
                $button   = '<a href="' . route('misi.edit', ['misi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                $button  .= '<a href="' . route('tujuan.index', ['misi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-plus-circle-outline"></i> ' . __('Tujuan') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        return PerencanaanMisi::create($request->all());
    }

    public function update($request, $misi)
    {
        return $misi->update($request->all());
    }
    
}
