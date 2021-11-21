<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenganggaranPembiayaanPendapatanRequest;
use App\Models\PenganggaranPembiayaanPendapatan;
use App\Models\PenganggaranTahun;
use App\Models\RekeningObjek;
use Illuminate\Http\Request;
use App\Services\PenganggaranPembiayaanPendapatanServices;

class PenganggaranPembiayaanPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranTahun $tahunAnggaran, PenganggaranPembiayaanPendapatanServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($tahunAnggaran);
        return view('penganggaran_pembiayaan_pendapatan.index')->with(['tahunAnggaran' => $tahunAnggaran]);
    }

    public function detail(PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek, PenganggaranPembiayaanPendapatanServices $services)
    {
        if (request()->ajax()) return $services->getDetailDataTables($tahunAnggaran, $rekeningObjek);
        return view('penganggaran_pembiayaan_pendapatan.index2')->with(['tahunAnggaran' => $tahunAnggaran, 'rekeningObjek' => $rekeningObjek]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranTahun $tahunAnggaran, PenganggaranPembiayaanPendapatanServices $services)
    {
        // Cari Kegiatan berdasarkan sub bidang
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->pendapatanOptions();

        return view('penganggaran_pembiayaan_pendapatan.create')->with([
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
    public function store(PenganggaranPembiayaanPendapatanRequest $request, PenganggaranTahun $tahunAnggaran, PenganggaranPembiayaanPendapatanServices $services)
    {
        $services->store($tahunAnggaran, $request);
        return redirect()->route("penganggaran.biaya-pendapatan.detail.index", ["tahun_anggaran" => $tahunAnggaran->id, "rekening_objek" => $request->id_rekening_objek])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranPembiayaanPendapatan  $penganggaranPembiayaanPendapatan
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranPembiayaanPendapatan $penganggaranPembiayaanPendapatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranPembiayaanPendapatan  $penganggaranPembiayaanPendapatan
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranPembiayaanPendapatan $biayaPendapatan, PenganggaranPembiayaanPendapatanServices $services)
    {
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->pendapatanOptions();

        return view('penganggaran_pembiayaan_pendapatan.edit')->with([
            'pendapatan' => $biayaPendapatan,
            'tahunAnggaran' => $biayaPendapatan->tahun_anggaran->id,
            'sumber_dana' => $sumber_dana,
            'rekening_objek' => $rekening_objek
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranPembiayaanPendapatan  $penganggaranPembiayaanPendapatan
     * @return \Illuminate\Http\Response
     */
    public function update(PenganggaranPembiayaanPendapatanRequest $request, PenganggaranPembiayaanPendapatan $biayaPendapatan, PenganggaranPembiayaanPendapatanServices $services)
    {
        $services->update($request, $biayaPendapatan);
        return redirect()->route("penganggaran.biaya-pendapatan.detail.index", ["tahun_anggaran" => $biayaPendapatan->tahun_anggaran->id, "rekening_objek" => $biayaPendapatan->id_rekening_objek])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranPembiayaanPendapatan  $penganggaranPembiayaanPendapatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranPembiayaanPendapatan $penganggaranPembiayaanPendapatan)
    {
        //
    }

    public function destroys(Request $request, PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranPembiayaanPendapatan::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.biaya-pendapatan.detail.index', ['tahun_anggaran' => $tahunAnggaran->id, 'rekening_objek' => $rekeningObjek->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
