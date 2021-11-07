<?php

namespace App\Services;

use App\Models\KaurKeuangan;
use Illuminate\Support\Facades\Auth;
use DataTables;

class KaurKeuanganServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables()
    {
        return Datatables::of(KaurKeuangan::where(['id_desa' => $this->userDesaID])->get())
            ->addColumn('action', function ($row) {
                $button  = '<a href="' . route('kaur-keuangan.edit', ['kaur_keuangan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        $request['id_desa'] = $this->userDesaID;
        return KaurKeuangan::create($request->all());
    }

    public function update($request, $kaurKeuangan)
    {
        $request['id_desa'] = $this->userDesaID;
        return $kaurKeuangan->update($request->all());
    }
    
}
