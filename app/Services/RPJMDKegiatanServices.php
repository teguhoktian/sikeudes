<?php

namespace App\Services;

use App\Models\PerencanaanSasaran;
use App\Models\RPJMDKegiatan;
use App\Models\RPJMDTahunKegiatan;
use Illuminate\Support\Facades\Auth;
use DataTables;

class RPJMDKegiatanServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables($subBidang)
    {
        return Datatables::of(RPJMDKegiatan::with(['kegiatan'])->where(['id_rpjmd_sub_bidang' => $subBidang->id])->get())
            ->editColumn('kegiatan.kode', function ($row) {
                return (($row->kegiatan) ? $row->kegiatan->sub_bidang->bidang->kode . '.' . $row->kegiatan->sub_bidang->kode  : '') . "." . $row->kegiatan->kode . ".";
            })
            ->addColumn('action', function ($row) {
                $button = '';
                $button .= '<a href="' . route('rpjmd.kegiatan.edit', ['kegiatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                $button .= '<a href="' . route('rpjmd.dana.indikatif.index', ['kegiatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Dana Indikatif') . '</a>';
                return $button;
            })->make();
    }

    public function getSasaranByIDVisi($subBidang)
    {
        return PerencanaanSasaran::select('perencanaan_sasaran.id', 'perencanaan_sasaran.uraian', 'perencanaan_sasaran.kode')
        ->selectRaw('CONCAT(perencanaan_misi.kode, ".", perencanaan_tujuan.kode,".",perencanaan_sasaran.kode,"  ",perencanaan_sasaran.uraian) AS full_name')
        ->leftJoin('perencanaan_tujuan', 'perencanaan_sasaran.id_tujuan', '=', 'perencanaan_tujuan.id')
        ->leftJoin('perencanaan_misi', 'perencanaan_tujuan.id_misi', '=', 'perencanaan_misi.id')
        ->leftJoin('perencanaan_visi', 'perencanaan_misi.id_visi', '=', 'perencanaan_visi.id')
        ->where(['perencanaan_visi.id' => $subBidang->rpjmd_bidang->id_visi])
        ->orderBy('perencanaan_misi.kode', 'ASC')
        ->orderBy('perencanaan_tujuan.kode', 'ASC')
        ->orderBy('perencanaan_sasaran.kode', 'ASC')
        ->get();
    }

    public function getPolaKegiatanOptions()
    {
        return [
            'Swakelola' => 'Swakelola',
            'Kerjasama' => 'Kerjasama antar Desa',
            'Pihak Ketiga' => 'Pihak ketiga',
        ];
    }

    public function store($subBidang, $request)
    {
        $tahun_awal = $subBidang->rpjmd_bidang->visi->tahun_awal;
        $request['id_rpjmd_sub_bidang'] = $subBidang->id;
        $kegiatan = RPJMDKegiatan::create($request->all());
        foreach ($request->tahun as $tahun) {
            $kegiatan->tahuns()->create(['tahun_ke' => $tahun, 'tahun' => $tahun + $tahun_awal - 1]);
        }
    }

    public function update($request, $kegiatan)
    {
        $tahun_awal = $kegiatan->rpjmd_sub_bidang->rpjmd_bidang->visi->tahun_awal;
        $tahun_kegiatan = $kegiatan->tahuns()->pluck('tahun_ke')->toArray();
        //if not in array insert new
        foreach ($request->tahun as $tahun) {
            if(!in_array($tahun, $tahun_kegiatan))
            {
                $kegiatan->tahuns()->create(['tahun_ke' => $tahun, 'tahun' => $tahun + $tahun_awal - 1]);
            }
        }
        RPJMDTahunKegiatan::whereNotIn('tahun_ke', $request->tahun)->delete();
        return $kegiatan->update($request->all());
    }
    
}
