<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerencanaanTujuanRequest;
use App\Models\PerencanaanMisi;
use App\Models\PerencanaanTujuan;
use App\Services\PerencanaanTujuanServices;
use Illuminate\Http\Request;

class PerencanaanTujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PerencanaanMisi $misi, PerencanaanTujuanServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($misi);
        return view('perencanaan_tujuan.index')->with(['misi' => $misi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PerencanaanMisi $misi)
    {
        return view('perencanaan_tujuan.create')->with([
            'misi' => $misi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerencanaanTujuanRequest $request, PerencanaanMisi $misi)
    {
        $tujuan = PerencanaanTujuan::create($request->all());
        $misi->tujuans()->save($tujuan);
        return redirect()->route('tujuan.index', ['misi' => $misi->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanTujuan  $perencanaanTujuan
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanTujuan $perencanaanTujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanTujuan  $perencanaanTujuan
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanTujuan $tujuan)
    {
        $this->authorize('update', $tujuan);
        $misis = PerencanaanMisi::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('perencanaan_tujuan.edit')->with(['tujuan' => $tujuan, 'misis' => $misis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerencanaanTujuan  $perencanaanTujuan
     * @return \Illuminate\Http\Response
     */
    public function update(PerencanaanTujuanRequest $request, PerencanaanTujuan $tujuan)
    {
        $this->authorize('update', $tujuan);
        $tujuan->update($request->all());
        return redirect()->route('tujuan.index', ['misi' => $tujuan->misi->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanTujuan  $perencanaanTujuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanTujuan $perencanaanTujuan)
    {
        //
    }

    public function destroys(PerencanaanMisi $misi, Request $request)
    {
        foreach ($request->id as $id) {
            PerencanaanTujuan::find($id)->delete();
        }
        return redirect()->route('tujuan.index', ['misi' => $misi->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}

