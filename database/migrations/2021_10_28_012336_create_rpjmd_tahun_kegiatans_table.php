<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRpjmdTahunKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmd_tahun_kegiatan', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_rpjmd_kegiatan')->nullable();
            $table->integer('tahun_ke')->unsigned()->nullable();
            $table->integer('tahun')->unsigned()->nullable();
            $table->timestamps();
        });
        
        Schema::table('rpjmd_tahun_kegiatan', function (Blueprint $table) {
            $table->foreign('id_rpjmd_kegiatan')->references('id')->on('rpjmd_kegiatan')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rpjmd_tahun_kegiatan', function (Blueprint $table) {
            $table->dropForeign('rpjmd_tahun_kegiatan_id_rpjmd_kegiatan_foreign');
        });
        Schema::dropIfExists('rpjmd_tahun_kegiatan');
    }
}
