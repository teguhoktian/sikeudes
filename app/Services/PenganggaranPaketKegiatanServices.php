<?php

namespace App\Services;

use App\Models\PenganggaranPaketKegiatan;
use App\Models\SumberDana;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PenganggaranPaketKegiatanServices
{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables($kegiatan)
    {
        return Datatables::of(PenganggaranPaketKegiatan::with(['sumber_dana'])->where(['id_penganggaran_kegiatan' => $kegiatan->id])->get())
            ->addIndexColumn()
            ->addColumn('volume_paket', function ($row) {
                return $row->volume_paket ." ". $row->satuan;
            })
            ->addColumn('action', function ($row) {
                $button = '';
                $button .= '<a href="' . route('penganggaran.paket.kegiatan.edit', ['paket_kegiatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function store($kegiatan, $request)
    {
        $request['id_penganggaran_kegiatan'] = $kegiatan->id;
        return PenganggaranPaketKegiatan::create($request->all());
    }

    public function update($request, $paketKegiatan)
    {
        return $paketKegiatan->update($request->all());
    }

    public function getSumberDana()
    {
        return SumberDana::orderBy('kode', 'ASC')->get();
    }

    public function getPolaKegiatanOptions()
    {
        return [
            'Swakelola' => 'Swakelola',
            'Kerjasama' => 'Kerjasama antar Desa',
            'Pihak Ketiga' => 'Pihak ketiga',
        ];
    }

    public function getSifatKegiatanOptions()
    {
        return [
            'Fisik Pembangunan' => 'Fisik Pembangunan',
            'Fisik Peningkatan' => 'Fisik Peningkatan',
            'Fisik Rehabilitasi' => 'Fisik Rehabilitasi',
            'Fisik Pemeliharaan' => 'Fisik Pemeliharaan',
            'Non Fisik Pelatihan' => 'Non Fisik Pelatihan',
            'Non Fisik Bim. Tek.' => 'Non Fisik Bim. Tek.'
        ];
    }
}
