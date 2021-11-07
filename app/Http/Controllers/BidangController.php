<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidangRequest;
use App\Models\Bidang;
use Illuminate\Http\Request;
use DataTables;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Bidang::get())
                ->addColumn('action', function ($row) {
                    $button  = '<a href="' . route('bidang.edit', ['bidang' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    $button .= '<a href="' . route('sub-bidang.index', ['bidang' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class=" mdi mdi-plus-circle-outline"></i> ' . __('Sub Bidang') . '</a>';
                    return $button;
                })->make();
        }
        return view('bidang.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BidangRequest $request)
    {
        Bidang::create($request->all());
        return redirect()->route('bidang.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function show(Bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Bidang $bidang)
    {
        return view('bidang.edit')->with([
            'bidang' => $bidang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function update(BidangRequest $request, Bidang $bidang)
    {
        $bidang->update($request->all());
        return redirect()->route('bidang.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bidang  $bidang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bidang $bidang)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            Bidang::find($id)->delete();
        }
        return redirect()->route('bidang.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
