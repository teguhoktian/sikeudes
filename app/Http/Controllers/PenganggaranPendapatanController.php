<?php

namespace App\Http\Controllers;

use App\Models\PenganggaranPendapatan;
use App\Models\PenganggaranTahun;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranTahun $tahunAnggaran, PenganggaranPendapatanServices $services)
    {
        // Cari Kegiatan berdasarkan sub bidang
        $sumber_dana = \App\Models\SumberDana::get()->pluck('nama', 'id');
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
    public function store(Request $request)
    {
        $services->store($subBidang, $request);
        return redirect()->route("penganggaran.kegiatan.index", ["sub_bidang" => $subBidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
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
    public function edit(PenganggaranPendapatan $penganggaranPendapatan)
    {
        $kegiatans = Kegiatan::where(['id_sub_bidang' => $kegiatan->penganggaran_sub_bidang->sub_bidang->id])->orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $pelaksanas = PelaksanaKegiatan::where(['id_desa' => Auth::user()->desa->id])->get()->pluck('full_name', 'id');

        return view('penganggaran_kegiatan.edit')->with([
            'kegiatan' => $kegiatan,
            'subBidang' => $kegiatan->penganggaran_sub_bidang,
            'kegiatans' => $kegiatans,
            'pelaksanas' => $pelaksanas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranPendapatan  $penganggaranPendapatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenganggaranPendapatan $penganggaranPendapatan)
    {
        $services->update($request, $kegiatan);
        return redirect()->route("penganggaran.kegiatan.index", ["sub_bidang" => $kegiatan->penganggaran_sub_bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
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

    public function destroys(Request $request, PenganggaranSubBidang $subBidang)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranKegiatan::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.kegiatan.index', ['sub_bidang' => $subBidang->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
