<?php

namespace App\Services;

use App\Models\PenganggaranBelanja;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PenganggaranBelanjaServices
{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables($tahunAnggaran)
    {
        $data = PenganggaranBelanja::selectRaw('id_rekening_objek, SUM(harga_satuan * volume) AS harga_satuan')->where(['id_penganggaran_tahun' => $tahunAnggaran->id])->groupBy('id_rekening_objek')->with(['rekening_objek'])->get();

        return Datatables::of($data)
            ->editColumn('harga_satuan', function ($row) {
                return number_format($row->harga_satuan, '0', '.', ',');
            })
            ->addColumn('action', function ($row) use ($tahunAnggaran) {
                $button = '';
                $button .= '<a href="' . route('penganggaran.belanja.detail.index', ['tahun_anggaran' => $tahunAnggaran->id, 'rekening_objek' => $row->id_rekening_objek]) . '" class="btn btn-sm btn-success btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Detail') . '</a>';
                return $button;
            })
            ->with('grand_total', function () use ($data) {
                return number_format($data->sum('harga_satuan'), '0', '.', ',');
            })
            ->make();
    }

    public function getDetailDataTables($tahunAnggaran, $rekeningObjek)
    {
        $query = PenganggaranBelanja::selectRaw('penganggaran_belanja.*, (harga_satuan * volume) AS total')
            ->where([
                'id_penganggaran_tahun' => $tahunAnggaran->id,
                'id_rekening_objek' => $rekeningObjek->id
            ])->with(['rekening_objek'])->get();

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('harga_satuan', function ($row) {
                return number_format($row->harga_satuan, '0', '.', ',');
            })
            ->editColumn('volume', function ($row) {
                return $row->volume . ' ' . $row->satuan;
            })
            ->editColumn('total', function ($row) {
                return number_format($row->total, '0', '.', ',');
            })
            ->addColumn('action', function ($row) {
                $button = '';
                $button .= '<a href="' . route('penganggaran.belanja.edit', ['belanja' => $row->id]) . '" class="btn btn-sm btn-success btn-rounded"><i class=" mdi mdi-lead-pencil"></i> ' . __('Edit') . '</a>';
                return $button;
            })
            ->with('grand_total', function () use ($query) {
                return number_format($query->sum('total'), '0', '.', ',');
            })
            ->make();
    }

    public function store($tahun, $request)
    {
        $request['id_penganggaran_tahun'] = $tahun->id;
        return PenganggaranBelanja::create($request->all());
    }

    public function update($request, $belanja)
    {
        return $belanja->update($request->all());
    }

    public function belanjaOptions()
    {
        return \App\Models\RekeningObjek::selectRaw('CONCAT(rekening_akun.kode,".",rekening_kelompok.kode,".", rekening_jenis.kode, ".", rekening_objek.kode, " ", rekening_objek.nama) AS nama, rekening_objek.id')
            ->join('rekening_jenis', 'rekening_objek.id_jenis', '=', 'rekening_jenis.id')
            ->join('rekening_kelompok', 'rekening_jenis.id_kelompok', '=', 'rekening_kelompok.id')
            ->join('rekening_akun', 'rekening_kelompok.id_akun', '=', 'rekening_akun.id')
            ->where(['rekening_akun.kode' => '5'])
            ->orderBy('rekening_akun.kode', 'ASC')
            ->orderBy('rekening_kelompok.kode', 'ASC')
            ->orderBy('rekening_jenis.kode', 'ASC')
            ->orderBy('rekening_objek.kode', 'ASC')
            ->get()->pluck('nama', 'id');
    }

    public function kegiatanOptions($tahunAnggaran)
    {
        return \App\Models\PenganggaranKegiatan::selectRaw('CONCAT(bidang.kode,".",sub_bidang.kode,".", kegiatan.kode, ".", " ", kegiatan.nama) AS nama, penganggaran_kegiatan.id')
            ->join('kegiatan', 'penganggaran_kegiatan.id_kegiatan', '=', 'kegiatan.id')
            ->join('penganggaran_sub_bidang', 'penganggaran_kegiatan.id_penganggaran_sub_bidang', '=', 'penganggaran_sub_bidang.id')
            ->join('penganggaran_bidang', 'penganggaran_sub_bidang.id_penganggaran_bidang', '=', 'penganggaran_bidang.id')
            ->join('penganggaran_tahun', 'penganggaran_bidang.id_penganggaran_tahun', '=', 'penganggaran_tahun.id')
            ->join('sub_bidang', function ($join) {
                $join->on('kegiatan.id_sub_bidang', '=', 'sub_bidang.id')
                    ->on('penganggaran_sub_bidang.id_sub_bidang', '=', 'sub_bidang.id');
            })
            ->join('bidang', function ($join) {
                $join->on('penganggaran_bidang.id_bidang', '=', 'bidang.id')
                    ->on('sub_bidang.id_bidang', '=', 'bidang.id');
            })
            ->where(['penganggaran_tahun.id' => $tahunAnggaran->id])
            ->orderBy('bidang.kode', 'ASC')
            ->orderBy('sub_bidang.kode', 'ASC')
            ->orderBy('kegiatan.kode', 'ASC')
            ->get()->pluck('nama', 'id');
    }
}
