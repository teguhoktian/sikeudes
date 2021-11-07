<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningAkunRequest;
use App\Http\Requests\RekeningKelompokRequest;
use App\Models\RekeningAkun;
use App\Models\RekeningKelompok;
use Illuminate\Http\Request;
use DataTables;

class RekeningKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RekeningAkun $rekeningAkun)
    {
        if (request()->ajax()) {
            return Datatables::of(RekeningKelompok::where(['id_akun' => $rekeningAkun->id])->get())
                ->editColumn('kode', function ($row) {
                    return (($row->akun) ? $row->akun->kode : '') . "." . $row->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="' . route('rekening-kelompok.edit', ['rekening_kelompok' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('rekening-jenis.index', ['rekening_kelompok' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Jenis') . '</a>';
                    return $button;
                })->make();
        }

        return view('rekening_kelompok.index')->with(['rekeningAkun' => $rekeningAkun]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RekeningAkun $rekeningAkun)
    {
        return view('rekening_kelompok.create')->with([
            'rekeningAkun' => $rekeningAkun
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RekeningKelompokRequest $request, RekeningAkun $rekeningAkun)
    {
        $kelompok = RekeningKelompok::create($request->all());
        $rekeningAkun->kelompoks()->save($kelompok);
        return redirect()->route('rekening-kelompok.index', ['rekening_akun' => $rekeningAkun->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekeningKelompok  $rekeningKelompok
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningKelompok $rekeningKelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekeningKelompok  $rekeningKelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(RekeningKelompok $rekeningKelompok)
    {
        $akuns = RekeningAkun::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('rekening_kelompok.edit')->with(['rekeningKelompok' => $rekeningKelompok, 'akuns' => $akuns]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekeningKelompok  $rekeningKelompok
     * @return \Illuminate\Http\Response
     */
    public function update(RekeningKelompokRequest $request, RekeningKelompok $rekeningKelompok)
    {
        $rekeningKelompok->update($request->all());
        return redirect()->route('rekening-kelompok.index', ['rekening_akun' => $rekeningKelompok->akun->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekeningKelompok  $rekeningKelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekeningKelompok $rekeningKelompok)
    {
        //
    }

    public function destroys(RekeningAkun $rekeningAkun, Request $request)
    {
        foreach ($request->id as $id) {
            RekeningKelompok::find($id)->delete();
        }
        return redirect()->route('rekening-kelompok.index', ['rekening_akun' => $rekeningAkun->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}

