<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\PerencanaanVisi;
use App\Models\RPJMDBidang;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class RPJMDBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PerencanaanVisi $visi)
    {
        if (request()->ajax()) {
            return Datatables::of(RPJMDBidang::where(['id_visi' => $visi->id])->with(['bidang'])->get())
                ->addColumn('action', function ($row) {
                    $button = '<a href="' . route('rpjmd.subbidang.index', ['bidang' => $row->id]) . '" class="btn btn-sm btn-success btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Sub Bidang') . '</a>';
                    return $button;
                })
                ->make();
        }
        return view('rpjmd_bidang.index')->with(['visi' => $visi]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PerencanaanVisi $visi)
    {
        $bidangs = Bidang::orderBy('kode', 'ASC')->get();
        return view('rpjmd_bidang.create')->with(['bidangs' => $bidangs, 'visi' => $visi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PerencanaanVisi $visi)
    {
        if(!$request->id_bidang) abort(403);
        foreach ($request->id_bidang as $id) {
            
            $check = (RPJMDBidang::where([
                'id_bidang' => $id,
                'id_desa' => Auth::user()->desa->id,
                'id_visi' => $visi->id
            ]))->first();

            if(!$check){
                RPJMDBidang::create([
                    'id_bidang' => $id,
                    'id_desa' => Auth::user()->desa->id,
                    'id_visi' => $visi->id
                ]);
            }
        }
        return redirect()->route('rpjmd.bidang.index', ['visi' => $visi->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RPJMDBidang  $rPJMDBidang
     * @return \Illuminate\Http\Response
     */
    public function show(RPJMDBidang $rPJMDBidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RPJMDBidang  $rPJMDBidang
     * @return \Illuminate\Http\Response
     */
    public function edit(RPJMDBidang $rPJMDBidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RPJMDBidang  $rPJMDBidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RPJMDBidang $rPJMDBidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RPJMDBidang  $rPJMDBidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(RPJMDBidang $rPJMDBidang)
    {
        //
    }

    public function destroys(Request $request, PerencanaanVisi $visi)
    {
        if($request->id){
            foreach ($request->id as $id) {
                RPJMDBidang::find($id)->delete();
            }
        }
        return redirect()->route('rpjmd.bidang.index', ['visi' => $visi->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
