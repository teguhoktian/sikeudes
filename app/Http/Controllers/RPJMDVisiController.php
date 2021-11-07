<?php

namespace App\Http\Controllers;

use App\Models\PerencanaanVisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class RPJMDVisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(PerencanaanVisi::where(['id_desa' => Auth::user()->desa->id])->orderBy('tahun_awal', 'DESC')->get())
            ->addColumn('action', function ($row) {
                $button   = '<a href="' . route('rpjmd.bidang.index', ['visi' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-plus-circle-outline"></i> ' . __('Bidang') . '</a>';
                return $button;
            })->make();
        }
        return view('rpjmd_visi.index');
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
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function show(PerencanaanVisi $perencanaanVisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function edit(PerencanaanVisi $perencanaanVisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerencanaanVisi $perencanaanVisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerencanaanVisi  $perencanaanVisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerencanaanVisi $perencanaanVisi)
    {
        //
    }
}
