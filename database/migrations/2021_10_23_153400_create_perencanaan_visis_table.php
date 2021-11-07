<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerencanaanVisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perencanaan_visi', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_desa')->nullable();
            $table->string('kode', 2)->nullable();
            $table->text('uraian')->nullable();
            $table->integer('tahun_awal')->unsigned()->nullable();
            $table->integer('tahun_akhir')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('perencanaan_visi', function (Blueprint $table) {
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
        Schema::table('perencanaan_visi', function (Blueprint $table) {
            $table->dropForeign('perencanaan_visi_id_desa_foreign');
        });
        Schema::dropIfExists('perencanaan_visi');
    }
}
