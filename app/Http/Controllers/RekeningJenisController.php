<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningJenisRequest;
use App\Models\RekeningJenis;
use App\Models\RekeningKelompok;
use Illuminate\Http\Request;
use DataTables;

class RekeningJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RekeningKelompok $rekeningKelompok)
    {
        if (request()->ajax()) {
            return Datatables::of(RekeningJenis::where(['id_kelompok' => $rekeningKelompok->id])->get())
                ->editColumn('kode', function ($row) {
                    return (($row->kelompok) ? $row->kelompok->akun->kode . '.' . $row->kelompok->kode  : '') . "." . $row->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('rekening-jenis.edit', ['rekening_jenis' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('rekening-objek.index', ['rekening_jenis' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-plus-circle-outline"></i> ' . __('Objek') . '</a>';
                    return $button;
                })->make();
        }
        return view('rekening_jenis.index')->with(['rekeningKelompok' => $rekeningKelompok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RekeningKelompok $rekeningKelompok)
    {
        return view('rekening_jenis.create')->with([
            'rekeningKelompok' => $rekeningKelompok
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RekeningJenisRequest $request, RekeningKelompok $rekeningKelompok)
    {
        $jenis = RekeningJenis::create($request->all());
        $rekeningKelompok->jenises()->save($jenis);
        return redirect()->route('rekening-jenis.index', ['rekening_kelompok' => $rekeningKelompok->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekeningJenis  $rekeningJenis
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningJenis $rekeningJenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekeningJenis  $rekeningJenis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekeningJenis $rekeningJenis)
    {
        $kelompoks = RekeningKelompok::where('id_akun', $rekeningJenis->kelompok->akun->id)->orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('rekening_jenis.edit')->with(['rekeningJenis' => $rekeningJenis, 'kelompoks' => $kelompoks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekeningJenis  $rekeningJenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekeningJenis $rekeningJenis)
    {
        $rekeningJenis->update($request->all());
        return redirect()->route('rekening-jenis.index', ['rekening_kelompok' => $rekeningJenis->kelompok->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekeningJenis  $rekeningJenis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekeningJenis $rekeningJenis)
    {
        //
    }

    public function destroys(RekeningKelompok $rekeningKelompok, Request $request)
    {
        foreach ($request->id as $id) {
            RekeningJenis::find($id)->delete();
        }
        return redirect()->route('rekening-jenis.index', ['rekening_kelompok' => $rekeningKelompok->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
