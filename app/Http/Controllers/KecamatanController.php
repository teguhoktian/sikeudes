<?php

namespace App\Http\Controllers;

use App\Http\Requests\KecamatanRequest;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use DataTables;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kabupaten $kabupaten)
    {
        if (request()->ajax()) {
            return Datatables::of(Kecamatan::where(['id_kabupaten' => $kabupaten->id])->get())
                ->editColumn('kode', function ($row) {
                    return (($row->kabupaten) ? $row->kabupaten->provinsi->kode . '.' . $row->kabupaten->kode : '') . "." . $row->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="' . route('kecamatan.edit', ['kecamatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('desa.index', ['kecamatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Desa') . '</a>';
                    return $button;
                })->make();
        }
        return view('kecamatan.index')->with(['kabupaten' => $kabupaten]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kabupaten $kabupaten)
    {
        return view('kecamatan.create')->with([
            'kabupaten' => $kabupaten
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KecamatanRequest $request, Kabupaten $kabupaten)
    {
        $kecamatan = Kecamatan::create($request->all());
        $kabupaten->kecamatans()->save($kecamatan);
        return redirect()->route('kecamatan.index', ['kabupaten' => $kabupaten->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit')->with(['kecamatan' => $kecamatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $kecamatan->update($request->all());
        return redirect()->route('kecamatan.index', ['kabupaten' => $kecamatan->kabupaten->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        //
    }

    public function destroys(Kabupaten $kabupaten, Request $request)
    {
        foreach ($request->id as $id) {
            Kecamatan::find($id)->delete();
        }
        return redirect()->route('kecamatan.index', ['kabupaten' => $kabupaten->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
