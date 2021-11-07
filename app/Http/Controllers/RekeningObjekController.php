<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningObjekRequest;
use App\Models\RekeningJenis;
use App\Models\RekeningObjek;
use Illuminate\Http\Request;
use DataTables;

class RekeningObjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RekeningJenis $rekeningJenis)
    {
        if (request()->ajax()) {
            return Datatables::of(RekeningObjek::where(['id_jenis' => $rekeningJenis->id])->get())
                ->editColumn('kode', function ($row) {
                    return (($row->jenis) ? $row->jenis->kelompok->akun->kode . '.' . 
                    $row->jenis->kelompok->kode . '.' . $row->jenis->kode  : '') . "." . $row->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('rekening-objek.edit', ['rekening_objek' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    return $button;
                })->make();
        }
        return view('rekening_objek.index')->with(['rekeningJenis' => $rekeningJenis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RekeningJenis $rekeningJenis)
    {
        return view('rekening_objek.create')->with([
            'rekeningJenis' => $rekeningJenis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RekeningObjekRequest $request, RekeningJenis $rekeningJenis)
    {
        $objek = RekeningObjek::create($request->all());
        $rekeningJenis->objeks()->save($objek);
        return redirect()->route('rekening-objek.index', ['rekening_jenis' => $rekeningJenis->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekeningObjek  $rekeningObjek
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningObjek $rekeningObjek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekeningObjek  $rekeningObjek
     * @return \Illuminate\Http\Response
     */
    public function edit(RekeningObjek $rekeningObjek)
    {
        $jenises = RekeningJenis::where('id_kelompok', $rekeningObjek->jenis->kelompok->id)->orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('rekening_objek.edit')->with(['rekeningObjek' => $rekeningObjek, 'jenises' => $jenises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekeningObjek  $rekeningObjek
     * @return \Illuminate\Http\Response
     */
    public function update(RekeningObjekRequest $request, RekeningObjek $rekeningObjek)
    {
        $rekeningObjek->update($request->all());
        return redirect()->route('rekening-objek.index', ['rekening_jenis' => $rekeningObjek->jenis->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekeningObjek  $rekeningObjek
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekeningObjek $rekeningObjek)
    {
        //
    }

    public function destroys(RekeningJenis $rekeningJenis, Request $request)
    {
        foreach ($request->id as $id) {
            RekeningObjek::find($id)->delete();
        }
        return redirect()->route('rekening-objek.index', ['rekening_jenis' => $rekeningJenis->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
