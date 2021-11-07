<?php

namespace App\Http\Controllers;

use App\Models\PenganggaranBidang;
use App\Models\PenganggaranSubBidang;
use App\Models\SubBidang;
use Illuminate\Http\Request;
use DataTables;
class PenganggaranSubBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranBidang $bidang)
    {
        if (request()->ajax()) {
            return Datatables::of(PenganggaranSubBidang::with(['sub_bidang'])->where(['id_penganggaran_bidang' => $bidang->id])->get())
                ->editColumn('sub_bidang.kode', function ($row) {
                    return (($row->sub_bidang) ? $row->sub_bidang->bidang->kode : '') . "." . $row->sub_bidang->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button = '';
                    $button .= '<a href="' . route('penganggaran.kegiatan.index', ['sub_bidang' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Kegiatan') . '</a>';
                    return $button;
                })->make();
        }
        return view('penganggaran_subbidang.index')->with(['bidang' => $bidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranBidang $bidang)
    {
        $subbidangs = SubBidang::where(['id_bidang' => $bidang->id_bidang])->orderBy('kode', 'ASC')->get();
        return view('penganggaran_subbidang.create')->with([
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
    public function store(Request $request, PenganggaranBidang $bidang)
    {
        if (!$request->id_sub_bidang) abort(403);
        foreach ($request->id_sub_bidang as $id) {

            $check = (PenganggaranSubBidang::where([
                'id_sub_bidang' => $id,
                'id_penganggaran_bidang' => $bidang->id
            ]))->first();

            if (!$check) {
                PenganggaranSubBidang::create([
                    'id_sub_bidang' => $id,
                    'id_penganggaran_bidang' => $bidang->id
                ]);
            }
        }
        return redirect()->route("penganggaran.subbidang.index", ["bidang" => $bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranSubBidang  $penganggaranSubBidang
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranSubBidang $penganggaranSubBidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranSubBidang  $penganggaranSubBidang
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranSubBidang $penganggaranSubBidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranSubBidang  $penganggaranSubBidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenganggaranSubBidang $penganggaranSubBidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranSubBidang  $penganggaranSubBidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranSubBidang $penganggaranSubBidang)
    {
        //
    }

    public function destroys(Request $request, PenganggaranBidang $bidang)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranSubBidang::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.subbidang.index', ['bidang' => $bidang->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
