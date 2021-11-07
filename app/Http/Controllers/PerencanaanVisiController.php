<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerencanaanVisiRequest;
use App\Models\KepalaDesa;
use App\Models\PerencanaanVisi;
use App\Models\SekretarisDesa;
use App\Services\PerencanaanVisiServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PerencanaanVisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PerencanaanVisiServices $services)
    {
        if (request()->ajax()) return $services->getDataTables();
        return view('perencanaan_visi.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perencanaan_visi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerencanaanVisiRequest $request, PerencanaanVisiServices $services)
    {
        $services->store($request);
        return redirect()->route('visi.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanVisi $perencanaanVisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanVisi $visi)
    {
        $this->authorize('update', $visi);
        return view('perencanaan_visi.edit')->with([
            'perencanaanVisi' => $visi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function update(PerencanaanVisiRequest $request, PerencanaanVisi $visi, PerencanaanVisiServices $services)
    {
        $this->authorize('update', $visi);
        $services->update($request, $visi);
        return redirect()->route('visi.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanVisi $perencanaanVisi)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            PerencanaanVisi::find($id)->delete();
        }
        return redirect()->route('visi.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }

    public function printSetup(PerencanaanVisi $visi)
    {
        $kepala_desas = KepalaDesa::where('id_desa', $visi->desa->id)->orderBy('aktif', 'DESC')->get()->pluck('nama', 'id');
        $sekretaris_desas = SekretarisDesa::where('id_desa', $visi->desa->id)->orderBy('aktif', 'ASC')->get()->pluck('nama', 'id');
        return view('perencanaan_visi.printSetup')->with([
            'kepala_desas' => $kepala_desas,
            'sekretaris_desas' => $sekretaris_desas,
            'visi' => $visi
        ]);
    }

    public function printStore(PerencanaanVisi $visi, Request $request)
    {
        $this->authorize('update', $visi);
        $visi->tempat = $request->tempat;
        $visi->tanggal_penetapan = $request->tanggal_penetapan;
        $visi->id_kepala_desa = $request->id_kepala_desa;
        $visi->id_sekretaris_desa = $request->id_sekretaris_desa;
        $visi->update();
        return redirect()->route('visi.print.setup',['visi' => $visi->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }

    public function downloadPDF(PerencanaanVisi $visi)
    {
        $data = \App\Models\PerencanaanSasaran::select(
            'perencanaan_visi.uraian as visi',
            'perencanaan_misi.kode as kode_misi',
            'perencanaan_misi.uraian as misi',
            'perencanaan_tujuan.kode as kode_tujuan',
            'perencanaan_tujuan.uraian as uraian_tujuan',
            'perencanaan_sasaran.kode as kode_sasaran', 
            'perencanaan_sasaran.uraian as sasaran',
            DB::raw('(SELECT COUNT(perencanaan_sasaran.id) FROM perencanaan_sasaran WHERE perencanaan_sasaran.id_tujuan = perencanaan_tujuan.id) AS sasaran_tujuan'),
            'm.sasaran_misi'
        )
        ->leftJoin('perencanaan_tujuan', 'perencanaan_tujuan.id', '=', 'id_tujuan')
        ->leftJoin('perencanaan_misi', 'perencanaan_misi.id', '=', 'id_misi')
        ->leftJoin('perencanaan_visi', 'perencanaan_visi.id', '=', 'id_visi')
        ->leftJoin(DB::raw('(SELECT
                Count(perencanaan_sasaran.id) AS sasaran_misi,
                perencanaan_tujuan.id_misi AS id
                FROM
                perencanaan_sasaran 
                LEFT JOIN perencanaan_tujuan ON perencanaan_sasaran.id_tujuan = perencanaan_tujuan.id
                LEFT JOIN perencanaan_misi ON perencanaan_tujuan.id_misi = perencanaan_misi.id
                GROUP BY
                perencanaan_tujuan.id_misi) m'), function($join){
                    $join->on('m.id', '=', 'perencanaan_misi.id');
                })
        ->where('perencanaan_visi.id' , $visi->id)
        ->orderBy('kode_misi','ASC')
        ->orderBy('kode_tujuan','ASC')
        ->orderBy('kode_sasaran','ASC')
        ->get();
        /* 
        return view('perencanaan_visi.printPDF')->with([
            'data' => $data,
            'visi' => $visi
        ]); */

        $pdf = PDF::loadView('perencanaan_visi.printPDF', [
            'data' => $data,
            'visi' => $visi
        ])->setPaper('a4', 'landscape');;

        return $pdf->download('Visi_Desa.pdf');
    }
}

