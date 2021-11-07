<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenganggaranSubBidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penganggaran_sub_bidang', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_penganggaran_bidang')->nullable();
            $table->uuid('id_sub_bidang')->nullable();
            $table->timestamps();
        });
        Schema::table('penganggaran_sub_bidang', function (Blueprint $table) {
            $table->foreign('id_penganggaran_bidang')->references('id')->on('penganggaran_bidang')->onDelete('SET NULL');
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
        Schema::table('penganggaran_sub_bidang', function (Blueprint $table) {
            $table->dropForeign('penganggaran_sub_bidang_id_sub_bidang_foreign');
            $table->dropForeign('penganggaran_sub_bidang_id_penganggaran_bidang_foreign');
        });
        Schema::dropIfExists('penganggaran_sub_bidang');
    }
}
