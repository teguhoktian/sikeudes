<?php

namespace App\Http\Controllers;

use App\Models\PenganggaranTahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class PenganggaranTahunPembiayaanPendapatanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(PenganggaranTahun::where(['id_desa' => Auth::user()->desa->id])->orderBy('tahun', 'DESC')->get())
                ->addColumn('action', function ($row) {
                    $button   = '<a href="' . route('penganggaran.biaya-pendapatan.index', ['tahun_anggaran' => $row->id]) . '" class="btn btn-sm btn-default btn-rounded"><i class="mdi mdi-plus-circle-outline"></i> ' . __('RAP') . '</a>';
                    return $button;
                })->make();
        }
        return view('penganggaran_tahun_pembiayaan_pendapatan.index');
    }
}
