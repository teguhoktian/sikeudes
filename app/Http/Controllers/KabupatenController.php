<?php

namespace App\Http\Controllers;

use App\Http\Requests\KabupatenRequest;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use DataTables;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provinsi $provinsi)
    {
        if (request()->ajax()) {
            return Datatables::of(Kabupaten::where(['id_provinsi' => $provinsi->id])->get())
                ->editColumn('kode', function($row){
                    return (($row->provinsi) ? $row->provinsi->kode : '').".".$row->kode.".";
                })
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('kabupaten.edit', ['kabupaten' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('kecamatan.index', ['kabupaten' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Kecamatan') . '</a>';
                    return $button;
                })->make();
        }
        return view('kabupaten.index')->with(['provinsi' => $provinsi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provinsi $provinsi)
    {
        return view('kabupaten.create')->with(['provinsi' => $provinsi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KabupatenRequest $request, Provinsi $provinsi)
    {
        $kabupaten = Kabupaten::create($request->all());
        $provinsi->kabupatens()->save($kabupaten);
        return redirect()->route('kabupaten.index', ['provinsi' => $provinsi->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabupaten $kabupaten)
    {
        return view('kabupaten.edit')->with(['kabupaten' => $kabupaten]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(KabupatenRequest $request, Kabupaten $kabupaten)
    {
        $kabupaten->update($request->all());
        return redirect()->route('kabupaten.index', ['provinsi' => $kabupaten->provinsi->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        
    }

    public function destroys(Provinsi $provinsi, Request $request)
    {
        foreach ($request->id as $id) {
            Kabupaten::find($id)->delete();
        }
        return redirect()->route('kabupaten.index', ['provinsi' => $provinsi->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
