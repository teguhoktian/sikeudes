<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerencanaanMisiRequest;
use App\Models\PerencanaanMisi;
use App\Models\PerencanaanVisi;
use App\Services\PerencanaanMisiServices;
use Illuminate\Http\Request;

class PerencanaanMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PerencanaanVisi $visi, PerencanaanMisiServices $services)
    {
        if (request()->ajax()) return $services->getDataTables($visi);
        return view('perencanaan_misi.index')->with(['visi' => $visi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PerencanaanVisi $visi)
    {
        return view('perencanaan_misi.create')->with([
            'visi' => $visi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerencanaanMisiRequest $request, PerencanaanVisi $visi)
    {
        $misi = PerencanaanMisi::create($request->all());
        $visi->misis()->save($misi);
        return redirect()->route('misi.index', ['visi' => $visi->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanMisi $perencanaanMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanMisi $misi)
    {
        $this->authorize('update', $misi);
        $visis = PerencanaanVisi::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('perencanaan_misi.edit')->with(['misi' => $misi, 'visis' => $visis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Http\Response
     */
    public function update(PerencanaanMisiRequest $request, PerencanaanMisi $misi)
    {
        $this->authorize('update', $misi);
        $misi->update($request->all());
        return redirect()->route('misi.index', ['visi' => $misi->visi->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanMisi $perencanaanMisi)
    {
        //
    }

    public function destroys(PerencanaanVisi $visi, Request $request)
    {
        foreach ($request->id as $id) {
            PerencanaanMisi::find($id)->delete();
        }
        return redirect()->route('misi.index', ['visi' => $visi->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
