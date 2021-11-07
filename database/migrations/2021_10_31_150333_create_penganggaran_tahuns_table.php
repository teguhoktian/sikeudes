<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenganggaranTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penganggaran_tahun', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_desa')->nullable();
            $table->integer('tahun')->unsigned();
            $table->timestamps();
        });

        Schema::table('penganggaran_tahun', function (Blueprint $table) {
            $table->foreign('id_desa')->references('id')->on('desa')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penganggaran_tahun', function (Blueprint $table) {
            $table->dropForeign('penganggaran_tahun_id_desa_foreign');
        });
        Schema::dropIfExists('penganggaran_tahun');
    }
}
