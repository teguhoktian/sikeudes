<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekretarisDesaRequest;
use App\Models\SekretarisDesa;
use App\Services\SekretarisDesaServices;
use Illuminate\Http\Request;

class SekretarisDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SekretarisDesaServices $services)
    {
        if (request()->ajax()) return $services->getDataTables();
        return view('sekretaris_desa.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekretaris_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SekretarisDesaRequest $request, SekretarisDesaServices $services)
    {
        $services->store($request);
        return redirect()->route('sekretaris-desa.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SekretarisDesa  $sekretarisDesa
     * @return \Illuminate\Http\Response
     */
    public function show(SekretarisDesa $sekretarisDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SekretarisDesa  $sekretarisDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(SekretarisDesa $sekretarisDesa)
    {
        $this->authorize('update', $sekretarisDesa);
        return view('sekretaris_desa.edit')->with([
            'sekretarisDesa' => $sekretarisDesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SekretarisDesa  $sekretarisDesa
     * @return \Illuminate\Http\Response
     */
    public function update(SekretarisDesaRequest $request, SekretarisDesa $sekretarisDesa, SekretarisDesaServices $services)
    {
        $this->authorize('update', $sekretarisDesa);
        $services->update($request, $sekretarisDesa);
        return redirect()->route('sekretaris-desa.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SekretarisDesa  $sekretarisDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(SekretarisDesa $sekretarisDesa)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            SekretarisDesa::find($id)->delete();
        }
        return redirect()->route('sekretaris-desa.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
