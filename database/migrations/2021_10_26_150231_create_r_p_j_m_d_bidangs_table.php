<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRPJMDBidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmd_bidang', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_desa')->nullable();
            $table->uuid('id_bidang')->nullable();
            $table->timestamps();
        });

        Schema::table('rpjmd_bidang', function (Blueprint $table) {
            $table->foreign('id_desa')->references('id')->on('desa')->onDelete('SET NULL');
            $table->foreign('id_bidang')->references('id')->on('bidang')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rpjmd_bidang', function (Blueprint $table) {
            $table->dropForeign('rpjmd_bidang_id_bidang_foreign');
            $table->dropForeign('rpjmd_bidang_id_desa_foreign');
        });
        Schema::dropIfExists('rpjmd_bidang');
    }
}
