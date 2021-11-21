<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenganggaranPembiayaanBelanjaRequest;
use App\Models\PenganggaranPembiayaanBelanja;
use App\Models\PenganggaranTahun;
use App\Models\RekeningObjek;
use App\Services\PenganggaranPembiayaanBelanjaServices;
use Illuminate\Http\Request;

class PenganggaranPembiayaanBelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranTahun $tahunAnggaran, PenganggaranPembiayaanBelanjaServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($tahunAnggaran);
        return view('penganggaran_pembiayaan_belanja.index')->with(['tahunAnggaran' => $tahunAnggaran]);
    }

    public function detail(PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek, PenganggaranPembiayaanBelanjaServices $services)
    {
        if (request()->ajax()) return $services->getDetailDataTables($tahunAnggaran, $rekeningObjek);
        return view('penganggaran_pembiayaan_belanja.index2')->with(['tahunAnggaran' => $tahunAnggaran, 'rekeningObjek' => $rekeningObjek]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranTahun $tahunAnggaran, PenganggaranPembiayaanBelanjaServices $services)
    {
        // Cari Kegiatan berdasarkan sub bidang
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->pendapatanOptions();

        return view('penganggaran_pembiayaan_belanja.create')->with([
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
    public function store(PenganggaranPembiayaanBelanjaRequest $request, PenganggaranTahun $tahunAnggaran, PenganggaranPembiayaanBelanjaServices $services)
    {
        $services->store($tahunAnggaran, $request);
        return redirect()->route("penganggaran.biaya-belanja.detail.index", ["tahun_anggaran" => $tahunAnggaran->id, "rekening_objek" => $request->id_rekening_objek])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranPembiayaanBelanja  $penganggaranPembiayaanBelanja
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranPembiayaanBelanja $penganggaranPembiayaanBelanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranPembiayaanBelanja  $penganggaranPembiayaanBelanja
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranPembiayaanBelanja $biayaBelanja, PenganggaranPembiayaanBelanjaServices $services)
    {
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->pendapatanOptions();

        return view('penganggaran_pembiayaan_belanja.edit')->with([
            'biayaBelanja' => $biayaBelanja,
            'tahunAnggaran' => $biayaBelanja->tahun_anggaran->id,
            'sumber_dana' => $sumber_dana,
            'rekening_objek' => $rekening_objek
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranPembiayaanBelanja  $penganggaranPembiayaanBelanja
     * @return \Illuminate\Http\Response
     */
    public function update(PenganggaranPembiayaanBelanjaRequest $request, PenganggaranPembiayaanBelanja $biayaBelanja, PenganggaranPembiayaanBelanjaServices $services)
    {
        $services->update($request, $biayaBelanja);
        return redirect()->route("penganggaran.biaya-belanja.detail.index", ["tahun_anggaran" => $biayaBelanja->tahun_anggaran->id, "rekening_objek" => $biayaBelanja->id_rekening_objek])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranPembiayaanBelanja  $penganggaranPembiayaanBelanja
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request, PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranPembiayaanBelanja::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.biaya-belanja.detail.index', ['tahun_anggaran' => $tahunAnggaran->id, 'rekening_objek' => $rekeningObjek->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
