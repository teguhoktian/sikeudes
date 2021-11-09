<?php

namespace App\Services;

use App\Models\PenganggaranPendapatan;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PenganggaranPendapatanServices
{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables($tahunAnggaran)
    {
        return Datatables::of(PenganggaranPendapatan::where(['id_penganggaran_tahun' => $tahunAnggaran->id])->with(['sumber_dana', 'rekening_objek'])->get())
            ->addColumn('action', function ($row) {
                $button = '';
                // $button .= '<a href="' . route('penganggaran.subbidang.index', ['bidang' => $row->id]) . '" class="btn btn-sm btn-success btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Sub Bidang') . '</a>';
                return $button;
            })
            ->make();
    }

    public function store($tahun, $request)
    {
        $request['id_penganggaran_tahun'] = $tahun->id;
        return PenganggaranPendapatan::create($request->all());
    }

    public function update($request, $pendapatan)
    {
        return $pendapatan->update($request->all());
    }

    public function pendapatanOptions()
    {
        return \App\Models\RekeningObjek::selectRaw('CONCAT(rekening_akun.kode,".",rekening_kelompok.kode,".", rekening_jenis.kode, ".", rekening_objek.kode, " ", rekening_objek.nama) AS nama, rekening_objek.id')
        ->join('rekening_jenis', 'rekening_objek.id_jenis', '=', 'rekening_jenis.id')
        ->join('rekening_kelompok', 'rekening_jenis.id_kelompok', '=', 'rekening_kelompok.id')
        ->join('rekening_akun', 'rekening_kelompok.id_akun', '=', 'rekening_akun.id')
        ->where(['rekening_akun.nama' => 'Pendapatan'])
        ->orderBy('rekening_akun.kode', 'ASC')
        ->orderBy('rekening_kelompok.kode', 'ASC')
        ->orderBy('rekening_jenis.kode', 'ASC')
        ->orderBy('rekening_objek.kode', 'ASC')
        ->get()->pluck('nama', 'id');  
    }
}
