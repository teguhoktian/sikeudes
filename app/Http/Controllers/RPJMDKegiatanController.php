<?php

namespace App\Http\Controllers;

use App\Http\Requests\RPJMDKegiatanRequest;
use App\Models\Kegiatan;
use App\Models\RPJMDKegiatan;
use App\Models\RPJMDSubBidang;
use App\Services\RPJMDKegiatanServices;
use Illuminate\Http\Request;

class RPJMDKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RPJMDSubBidang $subBidang, RPJMDKegiatanServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($subBidang);
        return view('rpjmd_kegiatan.index')->with(['subBidang' => $subBidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RPJMDSubBidang $subBidang, RPJMDKegiatanServices $services)
    {
        // Cari Kegiatan berdasarkan sub bidang
        $kegiatans = Kegiatan::where(['id_sub_bidang' => $subBidang->sub_bidang->id])->orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        // Cari Sasaran Berdasarkan kode visi
        $sasarans = $services->getSasaranByIDVisi($subBidang)->pluck('full_name', 'id');

        return view('rpjmd_kegiatan.create')->with([
            'subBidang' => $subBidang,
            'kegiatans' => $kegiatans,
            'sasarans' => $sasarans,
            'pola_kegiatan' => $services->getPolaKegiatanOptions()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RPJMDSubBidang $subBidang, RPJMDKegiatanRequest $request, RPJMDKegiatanServices $services)
    {
        $services->store($subBidang, $request);
        return redirect()->route("rpjmd.kegiatan.index", ["sub_bidang" => $subBidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RPJMDKegiatan  $rPJMDKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(RPJMDKegiatan $rPJMDKegiatan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RPJMDKegiatan  $rPJMDKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(RPJMDKegiatan $kegiatan, RPJMDKegiatanServices $services)
    {
        // Cari Kegiatan berdasarkan sub bidang
        $kegiatans = Kegiatan::where(['id_sub_bidang' => $kegiatan->rpjmd_sub_bidang->sub_bidang->id])->get()->pluck('full_name', 'id');
        // Cari Sasaran Berdasarkan kode visirpjmd_sub_bidang
        $sasarans = $services->getSasaranByIDVisi($kegiatan->rpjmd_sub_bidang)->pluck('full_name', 'id');
        return view('rpjmd_kegiatan.edit')->with([
            'rpjmd_kegiatan' => $kegiatan,
            'subBidang' => $kegiatan->rpjmd_sub_bidang,
            'kegiatans' => $kegiatans,
            'sasarans' => $sasarans,
            'pola_kegiatan' => $services->getPolaKegiatanOptions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RPJMDKegiatan  $rPJMDKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(RPJMDKegiatanRequest $request, RPJMDKegiatan $kegiatan, RPJMDKegiatanServices $services)
    {
        $services->update($request, $kegiatan);
        return redirect()->route("rpjmd.kegiatan.index", ["sub_bidang" => $kegiatan->rpjmd_sub_bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RPJMDKegiatan  $rPJMDKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RPJMDKegiatan $rPJMDKegiatan)
    {
        //
    }

    public function destroys(Request $request, RPJMDSubBidang $subBidang)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                RPJMDKegiatan::find($id)->delete();
            }
        }
        return redirect()->route('rpjmd.kegiatan.index', ['sub_bidang' => $subBidang->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
