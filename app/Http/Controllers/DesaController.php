<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesaRequest;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use DataTables;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kecamatan $kecamatan)
    {
        if (request()->ajax()) {
            return Datatables::of(Desa::where(['id_kecamatan' => $kecamatan->id])->get())
                ->editColumn('kode', function ($row) {
                    return (($row->kecamatan) ? $row->kecamatan->kabupaten->provinsi->kode . '.' . $row->kecamatan->kabupaten->kode . '.' . $row->kecamatan->kode : '') . "." . $row->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="' . route('desa.edit', ['desa' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    return $button;
                })->make();
        }
        return view('desa.index')->with(['kecamatan' => $kecamatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kecamatan $kecamatan)
    {
        return view('desa.create')->with([
            'kecamatan' => $kecamatan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesaRequest $request, Kecamatan $kecamatan)
    {
        $desa = Desa::create($request->all());
        $kecamatan->desas()->save($desa);
        return redirect()->route('desa.index', ['kecamatan' => $kecamatan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        return view('desa.edit')->with(['desa' => $desa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(DesaRequest $request, Desa $desa)
    {
        $desa->update($request->all());
        return redirect()->route('desa.index', ['kecamatan' => $desa->kecamatan->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        //
    }

    public function destroys(Kecamatan $kecamatan, Request $request)
    {
        foreach ($request->id as $id) {
            Desa::find($id)->delete();
        }
        return redirect()->route('desa.index', ['kecamatan' => $kecamatan->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
