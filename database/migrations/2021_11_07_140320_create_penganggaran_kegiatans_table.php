<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenganggaranKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penganggaran_kegiatan', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_penganggaran_sub_bidang')->nullable();
            $table->uuid('id_kegiatan')->nullable();
            $table->uuid('id_pelaksana')->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->string('waktu_pelaksanaan', 100)->nullable();
            $table->bigInteger('pagu')->nullable()->default(0);
            $table->string('keluaran')->nullable();
            $table->integer('volume')->unsigned()->nullable();
            $table->string('satuan', 100)->nullable();
            $table->timestamps();
        });
        Schema::table('penganggaran_kegiatan', function (Blueprint $table) {
            $table->foreign('id_penganggaran_sub_bidang')->references('id')->on('penganggaran_sub_bidang')->onDelete('SET NULL');
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan')->onDelete('SET NULL');
            $table->foreign('id_pelaksana')->references('id')->on('pelaksana_kegiatan')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penganggaran_kegiatan', function (Blueprint $table) {
            $table->dropForeign('penganggaran_kegiatan_id_pelaksana_foreign');
            $table->dropForeign('penganggaran_kegiatan_id_kegiatan_foreign');
            $table->dropForeign('penganggaran_kegiatan_id_penganggaran_sub_bidang_foreign');
        });
        Schema::dropIfExists('penganggaran_kegiatan');
    }
}
