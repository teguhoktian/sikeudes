<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KaurKeuanganController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KepalaDesaController;
use App\Http\Controllers\PelaksanaKegiatanController;
use App\Http\Controllers\PenganggaranBidangController;
use App\Http\Controllers\PenganggaranKegiatanController;
use App\Http\Controllers\PenganggaranPaketKegiatanController;
use App\Http\Controllers\PenganggaranPendapatanController;
use App\Http\Controllers\PenganggaranSubBidangController;
use App\Http\Controllers\PenganggaranTahunBidangController;
use App\Http\Controllers\PenganggaranTahunController;
use App\Http\Controllers\PenganggaranTahunPendapatanController;
use App\Http\Controllers\PerencanaanMisiController;
use App\Http\Controllers\PerencanaanSasaranController;
use App\Http\Controllers\PerencanaanTujuanController;
use App\Http\Controllers\PerencanaanVisiController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RekeningAkunController;
use App\Http\Controllers\RekeningJenisController;
use App\Http\Controllers\RekeningKelompokController;
use App\Http\Controllers\RekeningObjekController;
use App\Http\Controllers\RPJMDBidangController;
use App\Http\Controllers\RPJMDDanaIndikatifController;
use App\Http\Controllers\RPJMDKegiatanController;
use App\Http\Controllers\RPJMDSubBidangController;
use App\Http\Controllers\RPJMDVisiController;
use App\Http\Controllers\SekretarisDesaController;
use App\Http\Controllers\SubBidangController;
use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('master')->group(function () {

    Route::post('user/destroys', [UserController::class, 'destroys'])->name('user.destroy');
    Route::resource('user', UserController::class)->except(['show', 'destroy']);

    Route::post('provinsi/destroys', [ProvinsiController::class, 'destroys'])->name('provinsi.destroy');
    Route::resource('provinsi', ProvinsiController::class)->except(['show', 'destroy']);

    Route::post('kabupaten/{provinsi}/destroys', [KabupatenController::class, 'destroys'])->name('kabupaten.destroy');
    Route::get('kabupaten/{provinsi}/index', [KabupatenController::class, 'index'])->name('kabupaten.index');
    Route::get('kabupaten/{provinsi}/create', [KabupatenController::class, 'create'])->name('kabupaten.create');
    Route::post('kabupaten/{provinsi}/store', [KabupatenController::class, 'store'])->name('kabupaten.store');
    Route::resource('kabupaten', KabupatenController::class)->only(['edit', 'update']);

    Route::post('kecamatan/{kabupaten}/destroys', [KecamatanController::class, 'destroys'])->name('kecamatan.destroy');
    Route::get('kecamatan/{kabupaten}/index', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::get('kecamatan/{kabupaten}/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
    Route::post('kecamatan/{kabupaten}/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
    Route::resource('kecamatan', KecamatanController::class)->only(['edit', 'update']);

    Route::post('desa/{kecamatan}/destroys', [DesaController::class, 'destroys'])->name('desa.destroy');
    Route::get('desa/{kecamatan}/index', [DesaController::class, 'index'])->name('desa.index');
    Route::get('desa/{kecamatan}/create', [DesaController::class, 'create'])->name('desa.create');
    Route::post('desa/{kecamatan}/store', [DesaController::class, 'store'])->name('desa.store');
    Route::resource('desa', DesaController::class)->only(['edit', 'update']);

    Route::post('bidang/destroys', [BidangController::class, 'destroys'])->name('bidang.destroy');
    Route::resource('bidang', BidangController::class)->except(['show', 'destroy']);

    Route::post('sub-bidang/{bidang}/destroys', [SubBidangController::class, 'destroys'])->name('sub-bidang.destroy');
    Route::get('sub-bidang/{bidang}/index', [SubBidangController::class, 'index'])->name('sub-bidang.index');
    Route::get('sub-bidang/{bidang}/create', [SubBidangController::class, 'create'])->name('sub-bidang.create');
    Route::post('sub-bidang/{bidang}/store', [SubBidangController::class, 'store'])->name('sub-bidang.store');
    Route::resource('sub-bidang', SubBidangController::class)->only(['edit', 'update']);

    Route::post('kegiatan/{sub_bidang}/destroys', [KegiatanController::class, 'destroys'])->name('kegiatan.destroy');
    Route::get('kegiatan/{sub_bidang}/index', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('kegiatan/{sub_bidang}/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('kegiatan/{sub_bidang}/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::resource('kegiatan', KegiatanController::class)->only(['edit', 'update']);

    Route::post('sumber-dana/destroys', [SumberDanaController::class, 'destroys'])->name('sumber-dana.destroy');
    Route::resource('sumber-dana', SumberDanaController::class)->except(['show', 'destroy']);

    Route::post('rekening-akun/destroys', [RekeningAkunController::class, 'destroys'])->name('rekening-akun.destroy');
    Route::resource('rekening-akun', RekeningAkunController::class)->except(['show', 'destroy']);

    Route::post('rekening-kelompok/{rekening_akun}/destroys', [RekeningKelompokController::class, 'destroys'])->name('rekening-kelompok.destroy');
    Route::get('rekening-kelompok/{rekening_akun}/index', [RekeningKelompokController::class, 'index'])->name('rekening-kelompok.index');
    Route::get('rekening-kelompok/{rekening_akun}/create', [RekeningKelompokController::class, 'create'])->name('rekening-kelompok.create');
    Route::post('rekening-kelompok/{rekening_akun}/store', [RekeningKelompokController::class, 'store'])->name('rekening-kelompok.store');
    Route::resource('rekening-kelompok', RekeningKelompokController::class)->only(['edit', 'update']);

    Route::post('rekening-jenis/{rekening_kelompok}/destroys', [RekeningJenisController::class, 'destroys'])->name('rekening-jenis.destroy');
    Route::get('rekening-jenis/{rekening_kelompok}/index', [RekeningJenisController::class, 'index'])->name('rekening-jenis.index');
    Route::get('rekening-jenis/{rekening_kelompok}/create', [RekeningJenisController::class, 'create'])->name('rekening-jenis.create');
    Route::post('rekening-jenis/{rekening_kelompok}/store', [RekeningJenisController::class, 'store'])->name('rekening-jenis.store');
    Route::patch('rekening-jenis/{rekening_jenis}', [RekeningJenisController::class, 'update'])->name('rekening-jenis.update');
    Route::get('rekening-jenis/{rekening_jenis}/edit', [RekeningJenisController::class, 'edit'])->name('rekening-jenis.edit');

    Route::post('rekening-objek/{rekening_jenis}/destroys', [RekeningObjekController::class, 'destroys'])->name('rekening-objek.destroy');
    Route::get('rekening-objek/{rekening_jenis}/index', [RekeningObjekController::class, 'index'])->name('rekening-objek.index');
    Route::get('rekening-objek/{rekening_jenis}/create', [RekeningObjekController::class, 'create'])->name('rekening-objek.create');
    Route::post('rekening-objek/{rekening_jenis}/store', [RekeningObjekController::class, 'store'])->name('rekening-objek.store');
    Route::resource('rekening-objek', RekeningObjekController::class)->only(['edit', 'update']);
});


Route::middleware(['auth'])->prefix('desa')->group(function () {
    Route::post('kepala-desa/destroys', [KepalaDesaController::class, 'destroys'])->name('kepala-desa.destroy');
    Route::resource('kepala-desa', KepalaDesaController::class)->except(['show', 'destroy']);

    Route::post('sekretaris-desa/destroys', [SekretarisDesaController::class, 'destroys'])->name('sekretaris-desa.destroy');
    Route::resource('sekretaris-desa', SekretarisDesaController::class)->except(['show', 'destroy']);

    Route::post('kaur-keuangan/destroys', [KaurKeuanganController::class, 'destroys'])->name('kaur-keuangan.destroy');
    Route::resource('kaur-keuangan', KaurKeuanganController::class)->except(['show', 'destroy']);

    Route::post('pelaksana-kegiatan/destroys', [PelaksanaKegiatanController::class, 'destroys'])->name('pelaksana-kegiatan.destroy');
    Route::resource('pelaksana-kegiatan', PelaksanaKegiatanController::class)->except(['show', 'destroy']);

    Route::prefix('perencanaan')->group(function () {
        Route::post('visi/destroys', [PerencanaanVisiController::class, 'destroys'])->name('visi.destroy');
        Route::get('visi/{visi}/print/setup', [PerencanaanVisiController::class, 'printSetup'])->name('visi.print.setup');
        Route::patch('visi/{visi}/print/setup', [PerencanaanVisiController::class, 'printStore'])->name('visi.print.store');
        Route::post('visi/{visi}/print/download', [PerencanaanVisiController::class, 'downloadPDF'])->name('visi.print.download');
        Route::resource('visi', PerencanaanVisiController::class)->except(['show', 'destroy']);

        Route::post('misi/{visi}/destroys', [PerencanaanMisiController::class, 'destroys'])->name('misi.destroy');
        Route::get('misi/{visi}/index', [PerencanaanMisiController::class, 'index'])->name('misi.index');
        Route::get('misi/{visi}/create', [PerencanaanMisiController::class, 'create'])->name('misi.create');
        Route::post('misi/{visi}/store', [PerencanaanMisiController::class, 'store'])->name('misi.store');
        Route::resource('misi', PerencanaanMisiController::class)->only(['edit', 'update']);

        Route::post('tujuan/{misi}/destroys', [PerencanaanTujuanController::class, 'destroys'])->name('tujuan.destroy');
        Route::get('tujuan/{misi}/index', [PerencanaanTujuanController::class, 'index'])->name('tujuan.index');
        Route::get('tujuan/{misi}/create', [PerencanaanTujuanController::class, 'create'])->name('tujuan.create');
        Route::post('tujuan/{misi}/store', [PerencanaanTujuanController::class, 'store'])->name('tujuan.store');
        Route::resource('tujuan', PerencanaanTujuanController::class)->only(['edit', 'update']);

        Route::post('sasaran/{tujuan}/destroys', [PerencanaanSasaranController::class, 'destroys'])->name('sasaran.destroy');
        Route::get('sasaran/{tujuan}/index', [PerencanaanSasaranController::class, 'index'])->name('sasaran.index');
        Route::get('sasaran/{tujuan}/create', [PerencanaanSasaranController::class, 'create'])->name('sasaran.create');
        Route::post('sasaran/{tujuan}/store', [PerencanaanSasaranController::class, 'store'])->name('sasaran.store');
        Route::resource('sasaran', PerencanaanSasaranController::class)->only(['edit', 'update']);
    });

    Route::prefix('rpjmd')->group(function () {

        Route::get('visi', [RPJMDVisiController::class, 'index'])->name('rpjmd.visi.index');

        Route::post('{visi}/bidang/destroys', [RPJMDBidangController::class, 'destroys'])->name('rpjmd.bidang.destroy');
        Route::get('{visi}/bidang', [RPJMDBidangController::class, 'index'])->name('rpjmd.bidang.index');
        Route::get('{visi}/bidang/create', [RPJMDBidangController::class, 'create'])->name('rpjmd.bidang.create');
        Route::post('{visi}/bidang/store', [RPJMDBidangController::class, 'store'])->name('rpjmd.bidang.store');

        Route::post('{bidang}/subbidang/destroys', [RPJMDSubBidangController::class, 'destroys'])->name('rpjmd.subbidang.destroy');
        Route::get('{bidang}/subbidang', [RPJMDSubBidangController::class, 'index'])->name('rpjmd.subbidang.index');
        Route::get('{bidang}/subbidang/create', [RPJMDSubBidangController::class, 'create'])->name('rpjmd.subbidang.create');
        Route::post('{bidang}/subbidang/store', [RPJMDSubBidangController::class, 'store'])->name('rpjmd.subbidang.store');

        Route::post('{sub_bidang}/kegiatan/destroys', [RPJMDKegiatanController::class, 'destroys'])->name('rpjmd.kegiatan.destroy');
        Route::get('{sub_bidang}/kegiatan', [RPJMDKegiatanController::class, 'index'])->name('rpjmd.kegiatan.index');
        Route::get('{sub_bidang}/kegiatan/create', [RPJMDKegiatanController::class, 'create'])->name('rpjmd.kegiatan.create');
        Route::get('{kegiatan}/kegiatan/edit', [RPJMDKegiatanController::class, 'edit'])->name('rpjmd.kegiatan.edit');
        Route::patch('{kegiatan}/kegiatan/update', [RPJMDKegiatanController::class, 'update'])->name('rpjmd.kegiatan.update');
        Route::post('{sub_bidang}/kegiatan/store', [RPJMDKegiatanController::class, 'store'])->name('rpjmd.kegiatan.store');

        Route::get('{dana_indikatif}/dana/indikatif/edit', [RPJMDDanaIndikatifController::class, 'edit'])->name('rpjmd.dana.indikatif.edit');
        Route::patch('{dana_indikatif}/dana/indikatif/update', [RPJMDDanaIndikatifController::class, 'update'])->name('rpjmd.dana.indikatif.update');
        Route::post('{kegiatan}/dana/indikatif/destroys', [RPJMDDanaIndikatifController::class, 'destroys'])->name('rpjmd.dana.indikatif.destroy');
        Route::get('{kegiatan}/dana/indikatif/create', [RPJMDDanaIndikatifController::class, 'create'])->name('rpjmd.dana.indikatif.create');
        Route::post('{kegiatan}/dana/indikatif/create', [RPJMDDanaIndikatifController::class, 'store'])->name('rpjmd.dana.indikatif.store');
        Route::get('{kegiatan}/dana/indikatif', [RPJMDDanaIndikatifController::class, 'index'])->name('rpjmd.dana.indikatif.index');
    });

    Route::prefix('penganggaran')->group(function () {

        Route::post('tahun-anggaran/destroys', [PenganggaranTahunController::class, 'destroys'])->name('tahun-anggaran.destroy');
        Route::resource('tahun-anggaran', PenganggaranTahunController::class)->except(['show', 'destroy']);


        Route::get('tahun/bidang', [PenganggaranTahunBidangController::class, 'index'])->name('bidang.tahun-anggaran.index');
        Route::post('{tahun_anggaran}/bidang/destroys', [PenganggaranBidangController::class, 'destroys'])->name('penganggaran.bidang.destroy');
        Route::get('{tahun_anggaran}/bidang', [PenganggaranBidangController::class, 'index'])->name('penganggaran.bidang.index');
        Route::get('{tahun_anggaran}/bidang/create', [PenganggaranBidangController::class, 'create'])->name('penganggaran.bidang.create');
        Route::post('{tahun_anggaran}/bidang/store', [PenganggaranBidangController::class, 'store'])->name('penganggaran.bidang.store');

        Route::post('{bidang}/sub-bidang/destroys', [PenganggaranSubBidangController::class, 'destroys'])->name('penganggaran.subbidang.destroy');
        Route::get('{bidang}/sub-bidang', [PenganggaranSubBidangController::class, 'index'])->name('penganggaran.subbidang.index');
        Route::get('{bidang}/sub-bidang/create', [PenganggaranSubBidangController::class, 'create'])->name('penganggaran.subbidang.create');
        Route::post('{bidang}/sub-bidang/store', [PenganggaranSubBidangController::class, 'store'])->name('penganggaran.subbidang.store');

        Route::post('{sub_bidang}/kegiatan/destroys', [PenganggaranKegiatanController::class, 'destroys'])->name('penganggaran.kegiatan.destroy');
        Route::get('{sub_bidang}/kegiatan', [PenganggaranKegiatanController::class, 'index'])->name('penganggaran.kegiatan.index');
        Route::get('{sub_bidang}/kegiatan/create', [PenganggaranKegiatanController::class, 'create'])->name('penganggaran.kegiatan.create');
        Route::get('{kegiatan}/kegiatan/edit', [PenganggaranKegiatanController::class, 'edit'])->name('penganggaran.kegiatan.edit');
        Route::patch('{kegiatan}/kegiatan/update', [PenganggaranKegiatanController::class, 'update'])->name('penganggaran.kegiatan.update');
        Route::post('{sub_bidang}/kegiatan/store', [PenganggaranKegiatanController::class, 'store'])->name('penganggaran.kegiatan.store');

        Route::get('{paket_kegiatan}/paket-kegiatan/edit', [PenganggaranPaketKegiatanController::class, 'edit'])->name('penganggaran.paket.kegiatan.edit');
        Route::patch('{paket_kegiatan}/paket-kegiatan/update', [PenganggaranPaketKegiatanController::class, 'update'])->name('penganggaran.paket.kegiatan.update');
        Route::post('{kegiatan}/paket-kegiatan/destroys', [PenganggaranPaketKegiatanController::class, 'destroys'])->name('penganggaran.paket.kegiatan.destroy');
        Route::get('{kegiatan}/paket-kegiatan/create', [PenganggaranPaketKegiatanController::class, 'create'])->name('penganggaran.paket.kegiatan.create');
        Route::post('{kegiatan}/paket-kegiatan/create', [PenganggaranPaketKegiatanController::class, 'store'])->name('penganggaran.paket.kegiatan.store');
        Route::get('{kegiatan}/paket-kegiatan', [PenganggaranPaketKegiatanController::class, 'index'])->name('penganggaran.paket.kegiatan.index');

        Route::get('tahun/pendapatan', [PenganggaranTahunPendapatanController::class, 'index'])->name('pendapatan.tahun-anggaran.index');
        Route::post('{tahun_anggaran}/pendapatan/destroys', [PenganggaranPendapatanController::class, 'destroys'])->name('penganggaran.pendapatan.destroy');
        Route::get('{tahun_anggaran}/pendapatan', [PenganggaranPendapatanController::class, 'index'])->name('penganggaran.pendapatan.index');
        Route::get('{tahun_anggaran}/pendapatan/create', [PenganggaranPendapatanController::class, 'create'])->name('penganggaran.pendapatan.create');
        Route::post('{tahun_anggaran}/pendapatan/store', [PenganggaranPendapatanController::class, 'store'])->name('penganggaran.pendapatan.store');
    });
});
