<?php

namespace App\Services;

use App\Models\SekretarisDesa;
use Illuminate\Support\Facades\Auth;
use DataTables;

class SekretarisDesaServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables()
    {
        return Datatables::of(SekretarisDesa::where(['id_desa' => $this->userDesaID])->get())
            ->addColumn('action', function ($row) {
                $button  = '<a href="' . route('sekretaris-desa.edit', ['sekretaris_desa' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        $request['id_desa'] = $this->userDesaID;
        return SekretarisDesa::create($request->all());
    }

    public function update($request, $sekretarisDesa)
    {
        $request['id_desa'] = $this->userDesaID;
        return $sekretarisDesa->update($request->all());
    }
    
}
