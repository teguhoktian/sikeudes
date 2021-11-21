<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenganggaranPembiayaanPendapatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penganggaran_pembiayaan_pendapatan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_penganggaran_tahun')->nullable();
            $table->uuid('id_rekening_objek')->nullable();
            $table->uuid('id_sumber_dana')->nullable();
            $table->string('uraian', 50)->nullable();
            $table->integer('volume')->unsigned()->nullable()->default(0);
            $table->string('satuan')->nullable();
            $table->bigInteger('harga_satuan')->nullable();
            $table->timestamps();
        });

        Schema::table('penganggaran_pembiayaan_pendapatan', function (Blueprint $table) {
            $table->foreign('id_penganggaran_tahun')->references('id')->on('penganggaran_tahun')->onDelete('SET NULL');
            $table->foreign('id_rekening_objek')->references('id')->on('rekening_objek')->onDelete('SET NULL');
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
        Schema::table('penganggaran_pembiayaan_pendapatan', function (Blueprint $table) {
            $table->dropForeign('penganggaran_pembiayaan_pendapatan_id_sumber_dana_foreign');
            $table->dropForeign('penganggaran_pembiayaan_pendapatan_id_rekening_objek_foreign');
            $table->dropForeign('penganggaran_pembiayaan_pendapatan_id_penganggaran_tahun_foreign');
        });
        Schema::dropIfExists('penganggaran_pembiayaan_pendapatan');
    }
}
