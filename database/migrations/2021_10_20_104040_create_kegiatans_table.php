<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_sub_bidang')->nullable();
            $table->string('kode', 2)->nullable();
            $table->string('nama')->nullable();
            $table->timestamps();
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->foreign('id_sub_bidang')->references('id')->on('sub_bidang')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropForeign('kegiatan_id_sub_bidang_foreign');
        });
        Schema::dropIfExists('kegiatan');
    }
}
