<?php

namespace App\Http\Controllers;

use App\Models\PenganggaranTahun;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class PenganggaranTahunPendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(PenganggaranTahun::where(['id_desa' => Auth::user()->desa->id])->orderBy('tahun', 'DESC')->get())
                ->addColumn('action', function ($row) {
                    $button   = '<a href="' . route('penganggaran.pendapatan.index', ['tahun_anggaran' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-plus-circle-outline"></i> ' . __('RAP') . '</a>';
                    return $button;
                })->make();
        }
        return view('penganggaran_tahun_pendapatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranTahun $penganggaranTahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranTahun $penganggaranTahun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenganggaranTahun $penganggaranTahun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranTahun  $penganggaranTahun
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranTahun $penganggaranTahun)
    {
        //
    }
}
