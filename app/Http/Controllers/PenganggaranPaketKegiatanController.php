<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenganggaranPaketKegiatanRequest;
use App\Models\PenganggaranKegiatan;
use App\Models\PenganggaranPaketKegiatan;
use App\Services\PenganggaranPaketKegiatanServices;
use Illuminate\Http\Request;

class PenganggaranPaketKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranKegiatan $kegiatan, PenganggaranPaketKegiatanServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($kegiatan);
        return view('penganggaran_paket_kegiatan.index')->with(['kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranKegiatan $kegiatan, PenganggaranPaketKegiatanServices $services)
    {
        return view('penganggaran_paket_kegiatan.create')->with([
            'sumber_dana' => $services->getSumberDana()->pluck('nama', 'id'),
            'kegiatan' => $kegiatan,
            'pola_kegiatan' => $services->getPolaKegiatanOptions(),
            'sifat_kegiatan' => $services->getSifatKegiatanOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenganggaranPaketKegiatanRequest $request, PenganggaranKegiatan $kegiatan, PenganggaranPaketKegiatanServices $services)
    {
        $services->store($kegiatan, $request);
        return redirect()->route('penganggaran.paket.kegiatan.index', ['kegiatan' => $kegiatan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
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
    public function edit(PenganggaranPaketKegiatan $paketKegiatan, PenganggaranPaketKegiatanServices $services)
    {
        return view('penganggaran_paket_kegiatan.edit')->with([
            'sumber_dana' => $services->getSumberDana()->pluck('nama', 'id'),
            'paketKegiatan' => $paketKegiatan,
            'pola_kegiatan' => $services->getPolaKegiatanOptions(),
            'sifat_kegiatan' => $services->getSifatKegiatanOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranPaketKegiatan  $penganggaranPaketKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(PenganggaranPaketKegiatanRequest $request, PenganggaranPaketKegiatan $paketKegiatan, PenganggaranPaketKegiatanServices $services)
    {
        $services->update($request, $paketKegiatan);
        return redirect()->route('penganggaran.paket.kegiatan.index', ['kegiatan' => $paketKegiatan->penganggaran_kegiatan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
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

    public function destroys(Request $request, PenganggaranKegiatan $kegiatan)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranPaketKegiatan::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.paket.kegiatan.index', ['kegiatan' => $kegiatan->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
