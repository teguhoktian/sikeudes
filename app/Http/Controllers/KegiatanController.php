<?php

namespace App\Http\Controllers;

use App\Http\Requests\KegiatanRequest;
use App\Models\Kegiatan;
use App\Models\SubBidang;
use Illuminate\Http\Request;
use DataTables;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubBidang $subBidang)
    {
        if (request()->ajax()) {
            return Datatables::of(Kegiatan::where(['id_sub_bidang' => $subBidang->id])->get())
                ->editColumn('kode', function ($row) {
                    return (($row->sub_bidang) ? $row->sub_bidang->bidang->kode . '.' . $row->sub_bidang->kode  : '') . "." . $row->kode . ".";
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="' . route('kegiatan.edit', ['kegiatan' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-lead-pencil"></i> ' . __('Ubah') . '</a>';
                    return $button;
                })->make();
        }
        return view('kegiatan.index')->with(['subBidang' => $subBidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SubBidang $subBidang)
    {
        return view('kegiatan.create')->with([
            'subBidang' => $subBidang
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KegiatanRequest $request, SubBidang $subBidang)
    {
        $kegiatan = Kegiatan::create($request->all());
        $subBidang->kegiatans()->save($kegiatan);
        return redirect()->route('kegiatan.index', ['sub_bidang' => $subBidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        $subBidangs = SubBidang::where('id_bidang', $kegiatan->sub_bidang->bidang->id)->orderBy('kode', 'ASC')->get()->pluck('full_name', 'id');
        return view('kegiatan.edit')->with(['kegiatan' => $kegiatan, 'subBidangs' => $subBidangs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(KegiatanRequest $request, Kegiatan $kegiatan)
    {
        $kegiatan->update($request->all());
        return redirect()->route('kegiatan.index', ['sub_bidang' => $kegiatan->sub_bidang->id])->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }

    public function destroys(SubBidang $subBidang, Request $request)
    {
        foreach ($request->id as $id) {
            Kegiatan::find($id)->delete();
        }
        return redirect()->route('kegiatan.index', ['sub_bidang' => $subBidang->id])->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
