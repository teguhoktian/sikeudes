<?php

namespace App\Services;

use App\Models\PelaksanaKegiatan;
use App\Models\RPJMDDanaIndikatif;
use App\Models\RPJMDTahunKegiatan;
use App\Models\SumberDana;
use Illuminate\Support\Facades\Auth;
use DataTables;

class RPJMDDanaIndikatifServices{

    public function __construct()
    {
        $this->userDesaID = Auth::user()->desa->id;
    }

    public function getDataTables($kegiatan)
    {
        $tahun_kegiatan = $kegiatan->tahuns()->pluck('id')->toArray();
        return Datatables::of(RPJMDDanaIndikatif::with(['tahun_kegiatan', 'sumber_dana'])->whereIn('id_rpjmd_tahun_kegiatan', $tahun_kegiatan)->get())
            ->editColumn('biaya', function($row){
                return number_format($row->biaya, '0', '.', ',');
            })
            ->addColumn('action', function ($row) {
                $button = '';
                $button .= '<a href="' . route('rpjmd.dana.indikatif.edit', ['dana_indikatif' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                return $button;
            })->make();
    }

    public function getPolaKegiatanOptions()
    {
        return [
            'Swakelola' => 'Swakelola',
            'Kerjasama' => 'Kerjasama antar Desa',
            'Pihak Ketiga' => 'Pihak ketiga',
        ];
    }

    public function getTahunKegiatanByKegiatan($RPJMDKegiatan, $except = "")
    {
        $tahun  = RPJMDTahunKegiatan::where('id_rpjmd_kegiatan' , $RPJMDKegiatan->id)->doesntHave('dana_indikatif')->orderBy('tahun', 'ASC');
        if($except){
            $tahun->orWhere('id', $except);
        }
        return $tahun->get();
    }

    public function getPelaksana()
    {
        return PelaksanaKegiatan::where([
            'id_desa' => $this->userDesaID,
            'aktif' => 'Ya'
        ])->orderBy('jabatan', 'ASC')->get();
    }

    public function getSumberDana()
    {
        return SumberDana::orderBy('kode', 'ASC')->get();
    }

    public function store($request)
    {
        return RPJMDDanaIndikatif::create($request->all());
    }

    public function update($request, $danaIndikatif)
    {
        return $danaIndikatif->update($request->all());
    }
    
}
