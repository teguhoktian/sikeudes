<?php

namespace App\Http\Controllers;

use App\Http\Requests\KepalaDesaRequest;
use App\Models\KepalaDesa;
use App\Services\KepalaDesaServices;
use Illuminate\Http\Request;

class KepalaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KepalaDesaServices $services)
    {
        if (request()->ajax()) return $services->getDataTables();
        return view('kepala_desa.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kepala_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KepalaDesaRequest $request, KepalaDesaServices $services)
    {
        $services->store($request);
        return redirect()->route('kepala-desa.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KepalaDesa  $kepalaDesa
     * @return \Illuminate\Http\Response
     */
    public function show(KepalaDesa $kepalaDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KepalaDesa  $kepalaDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(KepalaDesa $kepalaDesa)
    {
        $this->authorize('update', $kepalaDesa);
        return view('kepala_desa.edit')->with([
            'kepalaDesa' => $kepalaDesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KepalaDesa  $kepalaDesa
     * @return \Illuminate\Http\Response
     */
    public function update(KepalaDesaRequest $request, KepalaDesa $kepalaDesa, KepalaDesaServices $services)
    {
        $this->authorize('update', $kepalaDesa);
        $services->update($request, $kepalaDesa);
        return redirect()->route('kepala-desa.index')->with(['status' => 'success', 'message' => __('Data telah disimpan')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KepalaDesa  $kepalaDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(KepalaDesa $kepalaDesa)
    {
        //
    }

    public function destroys(Request $request)
    {
        foreach ($request->id as $id) {
            KepalaDesa::find($id)->delete();
        }
        return redirect()->route('kepala-desa.index')->with(['status' => 'success', 'message' => __('Data telah dihapus')]);
    }
}
