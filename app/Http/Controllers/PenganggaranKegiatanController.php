<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenganggaranKegiatanRequest;
use App\Models\Kegiatan;
use App\Models\PelaksanaKegiatan;
use App\Models\PenganggaranKegiatan;
use App\Models\PenganggaranSubBidang;
use App\Services\PenganggaranKegiatanServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenganggaranKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranSubBidang $subBidang, PenganggaranKegiatanServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($subBidang);
        return view('penganggaran_kegiatan.index')->with(['subBidang' => $subBidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranSubBidang $subBidang, PenganggaranKegiatanServices $services)
    {
        // Cari Kegiatan berdasarkan sub bidang
        $kegiatans = Kegiatan::where(['id_sub_bidang' => $subBidang->sub_bidang->id])->orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        $pelaksanas = PelaksanaKegiatan::where(['id_desa' => Auth::user()->desa->id ])->get()->pluck('full_name', 'id');

        return view('penganggaran_kegiatan.create')->with([
            'subBidang' => $subBidang,
            'kegiatans' => $kegiatans,
            'pelaksanas' => $pelaksanas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenganggaranSubBidang $subBidang, PenganggaranKegiatanRequest $request, PenganggaranKegiatanServices $services)
    {
        $services->store($subBidang, $request);
        return redirect()->route("penganggaran.kegiatan.index", ["sub_bidang" => $subBidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranKegiatan  $penganggaranKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranKegiatan $penganggaranKegiatan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranKegiatan  $penganggaranKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranKegiatan $kegiatan)
    {
        // Cari Kegiatan berdasarkan sub bidang
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
     * @param  \App\Models\PenganggaranKegiatan  $penganggaranKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(PenganggaranKegiatanRequest $request, PenganggaranKegiatan $kegiatan, PenganggaranKegiatanServices $services)
    {
        $services->update($request, $kegiatan);
        return redirect()->route("penganggaran.kegiatan.index", ["sub_bidang" => $kegiatan->penganggaran_sub_bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranKegiatan  $penganggaranKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranKegiatan $penganggaranKegiatan)
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
