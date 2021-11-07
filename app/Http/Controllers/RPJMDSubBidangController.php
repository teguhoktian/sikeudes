<?php

namespace App\Http\Controllers;

use App\Models\RPJMDBidang;
use App\Models\RPJMDSubBidang;
use App\Models\SubBidang;
use Illuminate\Http\Request;
use DataTables;

class RPJMDSubBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RPJMDBidang $bidang)
    {
        if (request()->ajax()) {
            return Datatables::of(RPJMDSubBidang::with(['sub_bidang'])->where(['id_rpjmd_bidang' => $bidang->id])->get())
                ->editColumn('sub_bidang.kode', function ($row) {
                    return (($row->sub_bidang) ? $row->sub_bidang->bidang->kode : '') . "." . $row->sub_bidang->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button = '';
                    $button .= '<a href="' . route('rpjmd.kegiatan.index', ['sub_bidang' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Kegiatan') . '</a>';
                    return $button;
                })->make();
        }
        return view('rpjmd_subbidang.index')->with(['bidang' => $bidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RPJMDBidang $bidang)
    {
        $subbidangs = SubBidang::where(['id_bidang' => $bidang->id_bidang])->orderBy('kode', 'ASC')->get();
        return view('rpjmd_subbidang.create')->with([
            'bidang' => $bidang,
            'subbidangs' => $subbidangs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RPJMDBidang $bidang)
    {
        if (!$request->id_sub_bidang) abort(403);
        foreach ($request->id_sub_bidang as $id) {

            $check = (RPJMDSubBidang::where([
                'id_sub_bidang' => $id,
                'id_rpjmd_bidang' => $bidang->id
            ]))->first();

            if (!$check) {
                RPJMDSubBidang::create([
                    'id_sub_bidang' => $id,
                    'id_rpjmd_bidang' => $bidang->id
                ]);
            }
        }
        return redirect()->route("rpjmd.subbidang.index", ["bidang" => $bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RPJMDSubBidang  $rPJMDSubBidang
     * @return \Illuminate\Http\Response
     */
    public function show(RPJMDSubBidang $rPJMDSubBidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RPJMDSubBidang  $rPJMDSubBidang
     * @return \Illuminate\Http\Response
     */
    public function edit(RPJMDSubBidang $rPJMDSubBidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RPJMDSubBidang  $rPJMDSubBidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RPJMDSubBidang $rPJMDSubBidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RPJMDSubBidang  $rPJMDSubBidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(RPJMDSubBidang $rPJMDSubBidang)
    {
        //
    }

    public function destroys(Request $request, RPJMDBidang $bidang)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                RPJMDSubBidang::find($id)->delete();
            }
        }
        return redirect()->route('rpjmd.subbidang.index', ['bidang' => $bidang->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
