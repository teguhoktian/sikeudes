<?php

namespace App\Http\Controllers;

use App\Http\Requests\RekeningAkunRequest;
use App\Models\RekeningAkun;
use Illuminate\Http\Request;
use DataTables;

class RekeningAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(RekeningAkun::get())
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('rekening-akun.edit', ['rekening_akun' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('rekening-kelompok.index', ['rekening_akun' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Kelompok') . '</a>';
                    return $button;
                })->make();
        }
        return view('rekening_akun.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekening_akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RekeningAkunRequest $request)
    {
        RekeningAkun::create($request->all());
        return redirect()->route('rekening-akun.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekeningAkun  $rekeningAkun
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningAkun $rekeningAkun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekeningAkun  $rekeningAkun
     * @return \Illuminate\Http\Response
     */
    public function edit(RekeningAkun $rekeningAkun)
    {
        return view('rekening_akun.edit')->with([
            'rekeningAkun' => $rekeningAkun
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekeningAkun  $rekeningAkun
     * @return \Illuminate\Http\Response
     */
    public function update(RekeningAkunRequest $request, RekeningAkun $rekeningAkun)
    {
        $rekeningAkun->update($request->all());
        return redirect()->route('rekening-akun.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekeningAkun  $rekeningAkun
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekeningAkun $rekeningAkun)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            RekeningAkun::find($id)->delete();
        }
        return redirect()->route('rekening-akun.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
