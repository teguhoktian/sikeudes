<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenganggaranBelanjaRequest;
use App\Models\PenganggaranBelanja;
use App\Models\PenganggaranTahun;
use App\Models\RekeningObjek;
use App\Services\PenganggaranBelanjaServices;
use Illuminate\Http\Request;

class PenganggaranBelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranTahun $tahunAnggaran, PenganggaranBelanjaServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($tahunAnggaran);
        return view('penganggaran_belanja.index')->with(['tahunAnggaran' => $tahunAnggaran]);
    }

    public function detail(PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek, PenganggaranBelanjaServices $services)
    {
        if (request()->ajax()) return $services->getDetailDataTables($tahunAnggaran, $rekeningObjek);
        return view('penganggaran_belanja.index2')->with(['tahunAnggaran' => $tahunAnggaran, 'rekeningObjek' => $rekeningObjek]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranTahun $tahunAnggaran, PenganggaranBelanjaServices $services)
    {
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->belanjaOptions();
        $kegiatan = $services->kegiatanOptions($tahunAnggaran);

        return view('penganggaran_belanja.create')->with([
            'tahunAnggaran' => $tahunAnggaran,
            'kegiatan' => $kegiatan,
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
    public function store(PenganggaranBelanjaRequest $request, PenganggaranTahun $tahunAnggaran, PenganggaranBelanjaServices $services)
    {
        $services->store($tahunAnggaran, $request);
        return redirect()->route("penganggaran.belanja.detail.index", ["tahun_anggaran" => $tahunAnggaran->id, "rekening_objek" => $request->id_rekening_objek])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranBelanja  $penganggaranBelanja
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranBelanja $penganggaranBelanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranBelanja  $penganggaranBelanja
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranBelanja $belanja, PenganggaranBelanjaServices $services)
    {
        $sumber_dana = \App\Models\SumberDana::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $rekening_objek = $services->belanjaOptions();
        $kegiatan = $services->kegiatanOptions($belanja->tahun_anggaran);

        return view('penganggaran_belanja.edit')->with([
            'belanja' => $belanja,
            'tahunAnggaran' => $belanja->tahun_anggaran->id,
            'kegiatan' => $kegiatan,
            'sumber_dana' => $sumber_dana,
            'rekening_objek' => $rekening_objek
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranBelanja  $penganggaranBelanja
     * @return \Illuminate\Http\Response
     */
    public function update(PenganggaranBelanjaRequest $request, PenganggaranBelanja $belanja, PenganggaranBelanjaServices $services)
    {
        $services->update($request, $belanja);
        return redirect()->route("penganggaran.belanja.detail.index", ["tahun_anggaran" => $belanja->tahun_anggaran->id, "rekening_objek" => $belanja->id_rekening_objek])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranBelanja  $penganggaranBelanja
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranBelanja $penganggaranBelanja)
    {
        //
    }

    public function destroys(Request $request, PenganggaranTahun $tahunAnggaran, RekeningObjek $rekeningObjek)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranBelanja::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.belanja.detail.index', ['tahun_anggaran' => $tahunAnggaran->id, 'rekening_objek' => $rekeningObjek->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
