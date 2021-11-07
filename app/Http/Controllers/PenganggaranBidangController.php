<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\PenganggaranBidang;
use App\Models\PenganggaranTahun;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class PenganggaranBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenganggaranTahun $tahunAnggaran)
    {
        if (request()->ajax()) {
            return Datatables::of(PenganggaranBidang::where(['id_penganggaran_tahun' => $tahunAnggaran->id])->with(['bidang'])->get())
                ->addColumn('action', function ($row) {
                    $button = '';
                    $button .= '<a href="' . route('penganggaran.subbidang.index', ['bidang' => $row->id]) . '" class="btn btn-sm btn-success btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Sub Bidang') . '</a>';
                    return $button;
                })
                ->make();
        }
        return view('penganggaran_bidang.index')->with(['tahunAnggaran' => $tahunAnggaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PenganggaranTahun $tahunAnggaran)
    {
        $bidangs = Bidang::orderBy('kode', 'ASC')->get();
        return view('penganggaran_bidang.create')->with(['bidangs' => $bidangs, 'tahunAnggaran' => $tahunAnggaran]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PenganggaranTahun $tahunAnggaran)
    {
        if (!$request->id_bidang) abort(403);
        foreach ($request->id_bidang as $id) {

            $check = (PenganggaranBidang::where([
                'id_bidang' => $id,
                'id_desa' => Auth::user()->desa->id,
                'id_penganggaran_tahun' => $tahunAnggaran->id
            ]))->first();

            if (!$check) {
                PenganggaranBidang::create([
                    'id_bidang' => $id,
                    'id_desa' => Auth::user()->desa->id,
                    'id_penganggaran_tahun' => $tahunAnggaran->id
                ]);
            }
        }
        return redirect()->route('penganggaran.bidang.index', ['tahun_anggaran' => $tahunAnggaran->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenganggaranBidang  $penganggaranBidang
     * @return \Illuminate\Http\Response
     */
    public function show(PenganggaranBidang $penganggaranBidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenganggaranBidang  $penganggaranBidang
     * @return \Illuminate\Http\Response
     */
    public function edit(PenganggaranBidang $penganggaranBidang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenganggaranBidang  $penganggaranBidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenganggaranBidang $penganggaranBidang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenganggaranBidang  $penganggaranBidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenganggaranBidang $penganggaranBidang)
    {
        //
    }

    public function destroys(Request $request, PenganggaranTahun $tahunAnggaran)
    {
        if ($request->id) {
            foreach ($request->id as $id) {
                PenganggaranBidang::find($id)->delete();
            }
        }
        return redirect()->route('penganggaran.bidang.index', ['tahun_anggaran' => $tahunAnggaran->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
