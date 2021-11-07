<?php

namespace App\Services;

use App\Models\PelaksanaKegiatan;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PelaksanaKegiatanServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables()
    {
        return Datatables::of(PelaksanaKegiatan::where(['id_desa' => $this->userDesaID])->get())
            ->addColumn('action', function ($row) {
                $button  = '<a href="' . route('pelaksana-kegiatan.edit', ['pelaksana_kegiatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        $request['id_desa'] = $this->userDesaID;
        return PelaksanaKegiatan::create($request->all());
    }

    public function update($request, $sekretarisDesa)
    {
        $request['id_desa'] = $this->userDesaID;
        return $sekretarisDesa->update($request->all());
    }
    
}
