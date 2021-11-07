<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelaksanaKegiatanRequest;
use App\Models\PelaksanaKegiatan;
use App\Services\PelaksanaKegiatanServices;
use Illuminate\Http\Request;

class PelaksanaKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PelaksanaKegiatanServices $services)
    {
        if (request()->ajax()) return $services->getDataTables();
        return view('pelaksana_kegiatan.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelaksana_kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelaksanaKegiatanRequest $request, PelaksanaKegiatanServices $services)
    {
        $services->store($request);
        return redirect()->route('pelaksana-kegiatan.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PelaksanaKegiatan  $pelaksanaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(PelaksanaKegiatan $pelaksanaKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PelaksanaKegiatan  $pelaksanaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(PelaksanaKegiatan $pelaksanaKegiatan)
    {
        $this->authorize('update', $pelaksanaKegiatan);
        return view('pelaksana_kegiatan.edit')->with([
            'pelaksanaKegiatan' => $pelaksanaKegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PelaksanaKegiatan  $pelaksanaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PelaksanaKegiatan $pelaksanaKegiatan, PelaksanaKegiatanServices $services)
    {
        $this->authorize('update', $pelaksanaKegiatan);
        $services->update($request, $pelaksanaKegiatan);
        return redirect()->route('pelaksana-kegiatan.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PelaksanaKegiatan  $pelaksanaKegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelaksanaKegiatan $pelaksanaKegiatan)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            PelaksanaKegiatan::find($id)->delete();
        }
        return redirect()->route('pelaksana-kegiatan.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
