<?php

namespace App\Http\Controllers;

use App\Http\Requests\SumberDanaRequest;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use DataTables;

class SumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(SumberDana::get())
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('sumber-dana.edit', ['sumber_dana' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    return $button;
                })->make();
        }
        return view('sumber_dana.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sumber_dana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SumberDanaRequest $request)
    {
        SumberDana::create($request->all());
        return redirect()->route('sumber-dana.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function show(SumberDana $sumberDana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function edit(SumberDana $sumberDana)
    {
        return view('sumber_dana.edit')->with([
            'sumberDana' => $sumberDana
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function update(SumberDanaRequest $request, SumberDana $sumberDana)
    {
        $sumberDana->update($request->all());
        return redirect()->route('sumber-dana.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function destroy(SumberDana $sumberDana)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            SumberDana::find($id)->delete();
        }
        return redirect()->route('sumber-dana.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
