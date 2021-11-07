<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubBidangRequest;
use App\Models\Bidang;
use App\Models\SubBidang;
use Illuminate\Http\Request;
use DataTables;

class SubBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bidang $bidang)
    {
        if (request()->ajax()) {
            return Datatables::of(SubBidang::where(['id_bidang' => $bidang->id])->get())
                ->editColumn('kode', function ($row) {
                    return (($row->bidang) ? $row->bidang->kode : '') . "." . $row->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="' . route('sub-bidang.edit', ['sub_bidang' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('kegiatan.index', ['sub_bidang' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Kegiatan') . '</a>';
                    return $button;
                })->make();
        }
        return view('sub_bidang.index')->with(['bidang' => $bidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bidang $bidang)
    {
        return view('sub_bidang.create')->with([
            'bidang' => $bidang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubBidangRequest $request, Bidang $bidang)
    {
        $sub_bidang = SubBidang::create($request->all());
        $bidang->sub_bidangs()->save($sub_bidang);
        return redirect()->route('sub-bidang.index', ['bidang' => $bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubBidang  $subBidang
     * @return \Illuminate\Http\Response
     */
    public function show(SubBidang $subBidang)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubBidang  $subBidang
     * @return \Illuminate\Http\Response
     */
    public function edit(SubBidang $subBidang)
    {
        $bidangs = Bidang::orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('sub_bidang.edit')->with(['subBidang' => $subBidang, 'bidangs' => $bidangs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubBidang  $subBidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubBidang $subBidang)
    {
        $subBidang->update($request->all());
        return redirect()->route('sub-bidang.index', ['bidang' => $subBidang->bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubBidang  $subBidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubBidang $subBidang)
    {
        //
    }

    public function destroys(Bidang $bidang, Request $request)
    {
        foreach ($request->id as $id) {
            SubBidang::find($id)->delete();
        }
        return redirect()->route('sub-bidang.index', ['bidang' => $bidang->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
