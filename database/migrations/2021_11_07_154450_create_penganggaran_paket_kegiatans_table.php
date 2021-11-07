<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenganggaranPaketKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penganggaran_paket_kegiatan', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_penganggaran_kegiatan')->nullable();
            $table->uuid('id_sumber_dana')->nullable();
            $table->string('nama_paket', 100)->nullable();
            $table->bigInteger('nilai_paket')->nullable()->default(0);
            $table->enum('pola', ['Swakelola', 'Kerjasama', 'Pihak Ketiga'])->nullable()->default(NULL);
            $table->string('sifat_paket')->nullable();
            $table->integer('volume_paket')->unsigned()->nullable()->default(0);
            $table->string('lokasi_paket')->nullable();
            $table->string('satuan')->nullable();
            $table->timestamps();
        });
        Schema::table('penganggaran_paket_kegiatan', function (Blueprint $table) {
            $table->foreign('id_penganggaran_kegiatan')->references('id')->on('penganggaran_kegiatan')->onDelete('SET NULL');
            $table->foreign('id_sumber_dana')->references('id')->on('sumber_dana')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penganggaran_paket_kegiatan', function (Blueprint $table) {
            $table->dropForeign('penganggaran_paket_kegiatan_id_sumber_dana_foreign');
            $table->dropForeign('penganggaran_paket_kegiatan_id_penganggaran_kegiatan_foreign');
        });
        Schema::dropIfExists('penganggaran_paket_kegiatan');
    }
}
