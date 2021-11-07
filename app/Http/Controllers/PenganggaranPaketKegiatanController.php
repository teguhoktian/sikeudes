<?php

namespace App\Http\Controllers;

use App\Models\PenganggaranPaketKegiatan;
use Illuminate\Http\Request;

class PenganggaranPaketKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RPJMDKegiatan $kegiatan, RPJMDDanaIndikatifServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($kegiatan);
        return view('rpjmd_dana_indikatif.index')->with(['kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RPJMDKegiatan $kegiatan, RPJMDDanaIndikatifServices $services)
    {
        return view('rpjmd_dana_indikatif.create')->with([
            'pelaksana' => $services->getPelaksana()->pluck('jabatan', 'id'),
            'sumber_dana' => $services->getSumberDana()->pluck('nama', 'id'),
            'kegiatan' => $kegiatan,
            'tahun_kegiatans' => $services->getTahunKegiatanByKegiatan($kegiatan)->pluck('full_name', 'id'),
            'pola_kegiatan' => $services->getPolaKegiatanOptions()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RPJMDDanaIndikatifRequest $request, RPJMDKegiatan $kegiatan, RPJMDDanaIndikatifServices $services)
    {
        $services->store($request);
        return redirect()->route('rpjmd.dana.indikatif.index', ['kegiatan' => $kegiatan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranPaketKegiatan  $penganggaranPaketKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranPaketKegiatan $penganggaranPaketKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranPaketKegiatan  $penganggaranPaketKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(RPJMDDanaIndikatif $danaIndikatif, RPJMDDanaIndikatifServices $services)
    {
        return view('rpjmd_dana_indikatif.edit')->with([
            'pelaksana' => $services->getPelaksana()->pluck('jabatan', 'id'),
            'sumber_dana' => $services->getSumberDana()->pluck('nama', 'id'),
            'danaIndikatif' => $danaIndikatif,
            'tahun_kegiatans' => $services->getTahunKegiatanByKegiatan($danaIndikatif->tahun_kegiatan->rpjmd_kegiatan, $danaIndikatif->id_rpjmd_tahun_kegiatan)->pluck('full_name', 'id'),
            'pola_kegiatan' => $services->getPolaKegiatanOptions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranPaketKegiatan  $penganggaranPaketKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(RPJMDDanaIndikatifRequest $request, RPJMDDanaIndikatif $danaIndikatif, RPJMDDanaIndikatifServices $services)
    {
        $services->update($request, $danaIndikatif);
        return redirect()->route('rpjmd.dana.indikatif.index', ['kegiatan' => $danaIndikatif->tahun_kegiatan->rpjmd_kegiatan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranPaketKegiatan  $penganggaranPaketKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranPaketKegiatan $penganggaranPaketKegiatan)
    {
        //
    }

    public function destroys(Request $request, RPJMDKegiatan $kegiatan)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                RPJMDDanaIndikatif::find($id)->delete();
            }
        }
        return redirect()->route('rpjmd.dana.indikatif.index', ['kegiatan' => $kegiatan->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
