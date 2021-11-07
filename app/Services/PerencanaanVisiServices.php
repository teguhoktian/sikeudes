<?php

namespace App\Services;

use App\Models\PerencanaanVisi;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PerencanaanVisiServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables()
    {
        return Datatables::of(PerencanaanVisi::where(['id_desa' => $this->userDesaID])->orderBy('tahun_awal', 'DESC')->get())
            ->addColumn('action', function ($row) {
                $button   = '<a href="' . route('visi.edit', ['visi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                $button  .= '<a href="' . route('visi.print.setup', ['visi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-printer"></i> ' . __('Print') . '</a>';
                $button  .= '<a href="' . route('misi.index', ['visi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-plus-circle-outline"></i> ' . __('Misi') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        $request['id_desa'] = $this->userDesaID;
        return PerencanaanVisi::create($request->all());
    }

    public function update($request, $visi)
    {
        $request['id_desa'] = $this->userDesaID;
        return $visi->update($request->all());
    }
    
}
