<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinsiRequest;
use DataTables;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) 
        {
            return Datatables::of(Provinsi::get())
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('provinsi.edit', ['provinsi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('kabupaten.index', ['provinsi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Kabupaten') . '</a>';
                    return $button;
                })->make();
        }
        return view('provinsi.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinsiRequest $request)
    {
        Provinsi::create($request->all());
        return redirect()->route('provinsi.index')->with(['status' => 'success', 'message' => __('Data telah disimpan') ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        return view('provinsi.edit')->with([
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinsiRequest $request, Provinsi $provinsi)
    {
        $provinsi->update($request->all());
        return redirect()->route('provinsi.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            Provinsi::find($id)->delete();
        }
        return redirect()->route('provinsi.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
