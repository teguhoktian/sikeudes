<?php

namespace App\Services;

use App\Models\KepalaDesa;
use Illuminate\Support\Facades\Auth;
use DataTables;

class KepalaDesaServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables()
    {
        return Datatables::of(KepalaDesa::where(['id_desa' => $this->userDesaID])->get())
            ->addColumn('action', function ($row) {
                $button  = '<a href="' . route('kepala-desa.edit', ['kepala_desa' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function store($request)
    {
        $request['id_desa'] = $this->userDesaID;
        return KepalaDesa::create($request->all());
    }

    public function update($request, $kepalaDesa)
    {
        $request['id_desa'] = $this->userDesaID;
        return $kepalaDesa->update($request->all());
    }
    
}
