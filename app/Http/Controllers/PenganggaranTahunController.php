<?php

namespace App\Http\Controllers;

use App\Models\PenganggaranTahun;
use App\Services\PenganggaranTahunServices;
use Illuminate\Http\Request;

class PenganggaranTahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranTahunServices $services)
    {
        if (request()->ajax()) return $services->getDataTables();
        return view('penganggaran_tahun.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penganggaran_tahun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PenganggaranTahunServices $services)
    {
        $services->store($request);
        return redirect()->route('tahun-anggaran.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranTahun $penganggaranTahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranTahun $tahunAnggaran)
    {
        $this->authorize('update', $tahunAnggaran);
        return view('penganggaran_tahun.edit')->with([
            'tahunAnggaran' => $tahunAnggaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenganggaranTahun $tahunAnggaran, PenganggaranTahunServices $services)
    {
        $this->authorize('update', $tahunAnggaran);
        $services->update($request, $tahunAnggaran);
        return redirect()->route('tahun-anggaran.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranTahun $penganggaranTahun)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            PenganggaranTahun::find($id)->delete();
        }
        return redirect()->route('tahun-anggaran.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
