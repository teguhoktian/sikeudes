<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenganggaranPendapatanRequest;
use App\Models\PenganggaranPendapatan;
use App\Models\PenganggaranTahun;
use App\Models\RekeningObjek;
use App\Services\PenganggaranPendapatanServices;
use Illuminate\Http\Request;

class PenganggaranPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranTahun $tahunAnggaran, PenganggaranPendapatanServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($tahunAnggaran);
        return view('penganggaran_pendapatan.index')->with(['tahunAnggaran' => $tahunAnggaran]);
    }

    public function detail(PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek, PenganggaranPendapatanServices $services)
    {
        if (request()->ajax()) return $services->getDetailDataTables($tahunAnggaran, $rekeningObjek);
        return view('penganggaran_pendapatan.index2')->with(['tahunAnggaran' => $tahunAnggaran, 'rekeningObjek' => $rekeningObjek]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranTahun $tahunAnggaran, PenganggaranPendapatanServices $services)
    {
        // Cari Kegiatan berdasarkan sub bidang
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->pendapatanOptions();

        return view('penganggaran_pendapatan.create')->with([
            'tahunAnggaran' => $tahunAnggaran,
            'sumber_dana' => $sumber_dana,
            'rekening_objek' => $rekening_objek
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenganggaranPendapatanRequest $request, PenganggaranTahun $tahunAnggaran, PenganggaranPendapatanServices $services)
    {
        $services->store($tahunAnggaran, $request);
        return redirect()->route("penganggaran.pendapatan.index", ["tahun_anggaran" => $tahunAnggaran->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranPendapatan  $penganggaranPendapatan
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranPendapatan $penganggaranPendapatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranPendapatan  $penganggaranPendapatan
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranPendapatan $pendapatan, PenganggaranPendapatanServices $services)
    {
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->pendapatanOptions();

        return view('penganggaran_pendapatan.edit')->with([
            'pendapatan' => $pendapatan,
            'tahunAnggaran' => $pendapatan->tahun_anggaran->id,
            'sumber_dana' => $sumber_dana,
            'rekening_objek' => $rekening_objek
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranPendapatan  $penganggaranPendapatan
     * @return \Illuminate\Http\Response
     */
    public function update(PenganggaranPendapatanRequest $request, PenganggaranPendapatan $pendapatan, PenganggaranPendapatanServices $services)
    {
        $services->update($request, $pendapatan);
        return redirect()->route("penganggaran.pendapatan.index", ["tahun_anggaran" => $pendapatan->tahun_anggaran->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranPendapatan  $penganggaranPendapatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranPendapatan $penganggaranPendapatan)
    {
        //
    }

    public function destroys(Request $request, PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranPendapatan::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.pendapatan.index', ['tahun_anggaran' => $tahunAnggaran->id, 'rekening_objek' => $rekeningObjek->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
