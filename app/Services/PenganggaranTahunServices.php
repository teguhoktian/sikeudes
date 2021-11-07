<?php

namespace App\Services;

use App\Models\PenganggaranTahun;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PenganggaranTahunServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables()
    {
        return Datatables::of(PenganggaranTahun::where(['id_desa' => $this->userDesaID])->get())
            ->addColumn('action', function ($row) {
                $button  = '<a href="' . route('tahun-anggaran.edit', ['tahun_anggaran' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        $request['id_desa'] = $this->userDesaID;
        return PenganggaranTahun::create($request->all());
    }

    public function update($request, $tahunAnggaran)
    {
        $request['id_desa'] = $this->userDesaID;
        return $tahunAnggaran->update($request->all());
    }
    
}
