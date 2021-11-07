<?php

namespace App\Services;

use App\Models\PenganggaranKegiatan;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PenganggaranKegiatanServices
{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables($subBidang)
    {
        return Datatables::of(PenganggaranKegiatan::with(['kegiatan'])->where(['id_penganggaran_sub_bidang' => $subBidang->id])->get())
            ->editColumn('kegiatan.kode', function ($row) {
                return (($row->kegiatan) ? $row->kegiatan->sub_bidang->bidang->kode . '.' . $row->kegiatan->sub_bidang->kode  : '') . "." . $row->kegiatan->kode . ".";
            })
            ->addColumn('action', function ($row) {
                $button = '';
                $button .= '<a href="' . route('penganggaran.kegiatan.edit', ['kegiatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                $button .= '<a href="' . route('penganggaran.paket.kegiatan.index', ['kegiatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Paket Kegiatan') . '</a>';
                return $button;
            })->make();
    }

    public function store($subBidang, $request)
    {
        $request['id_penganggaran_sub_bidang'] = $subBidang->id;
        return PenganggaranKegiatan::create($request->all());
    }

    public function update($request, $kegiatan)
    {
        return $kegiatan->update($request->all());
    }
}
