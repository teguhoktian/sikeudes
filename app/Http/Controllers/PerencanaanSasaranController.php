<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerencanaanSasaranRequest;
use App\Models\PerencanaanSasaran;
use App\Models\PerencanaanTujuan;
use App\Services\PerencanaanSasaranServices;
use Illuminate\Http\Request;

class PerencanaanSasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PerencanaanTujuan $tujuan, PerencanaanSasaranServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($tujuan);
        return view('perencanaan_sasaran.index')->with(['tujuan' => $tujuan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PerencanaanTujuan $tujuan)
    {
        return view('perencanaan_sasaran.create')->with([
            'tujuan' => $tujuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerencanaanSasaranRequest $request, PerencanaanTujuan $tujuan)
    {
        $sasaran = PerencanaanSasaran::create($request->all());
        $tujuan->sasarans()->save($sasaran);
        return redirect()->route('sasaran.index', ['tujuan' => $tujuan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanSasaran  $perencanaanSasaran
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanSasaran $perencanaanSasaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanSasaran  $perencanaanSasaran
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanSasaran $sasaran)
    {
        $this->authorize('update', $sasaran);
        $tujuans = PerencanaanTujuan::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('perencanaan_sasaran.edit')->with(['sasaran' => $sasaran, 'tujuans' => $tujuans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerencanaanSasaran  $perencanaanSasaran
     * @return \Illuminate\Http\Response
     */
    public function update(PerencanaanSasaranRequest $request, PerencanaanSasaran $sasaran)
    {
        $this->authorize('update', $sasaran);
        $sasaran->update($request->all());
        return redirect()->route('sasaran.index', ['tujuan' => $sasaran->tujuan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanSasaran  $perencanaanSasaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanSasaran $perencanaanSasaran)
    {
        //
    }

    public function destroys(PerencanaanTujuan $tujuan, Request $request)
    {
        foreach ($request->id as $id) {
            PerencanaanSasaran::find($id)->delete();
        }
        return redirect()->route('sasaran.index', ['tujuan' => $tujuan->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
