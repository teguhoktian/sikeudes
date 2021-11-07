<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaurKeuanganRequest;
use App\Models\KaurKeuangan;
use App\Services\KaurKeuanganServices;
use Illuminate\Http\Request;

class KaurKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KaurKeuanganServices $services)
    {
        if (request()->ajax()) return $services->getDataTables();
        return view('kaur_keuangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kaur_keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaurKeuanganRequest $request, KaurKeuanganServices $services)
    {
        $services->store($request);
        return redirect()->route('kaur-keuangan.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KaurKeuangan  $kaurKeuangan
     * @return \Illuminate\Http\Response
     */
    public function show(KaurKeuangan $kaurKeuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KaurKeuangan  $kaurKeuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(KaurKeuangan $kaurKeuangan)
    {
        $this->authorize('update', $kaurKeuangan);
        return view('kaur_keuangan.edit')->with([
            'kaurKeuangan' => $kaurKeuangan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KaurKeuangan  $kaurKeuangan
     * @return \Illuminate\Http\Response
     */
    public function update(KaurKeuanganRequest $request, KaurKeuangan $kaurKeuangan, KaurKeuanganServices $services)
    {
        $this->authorize('update', $kaurKeuangan);
        $services->update($request, $kaurKeuangan);
        return redirect()->route('kaur-keuangan.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KaurKeuangan  $kaurKeuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(KaurKeuangan $kaurKeuangan)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            KaurKeuangan::find($id)->delete();
        }
        return redirect()->route('kaur-keuangan.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
