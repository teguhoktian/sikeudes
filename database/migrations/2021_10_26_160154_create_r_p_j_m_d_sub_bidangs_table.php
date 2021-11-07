<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRPJMDSubBidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmd_subbidang', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_rpjmd_bidang')->nullable();
            $table->uuid('id_sub_bidang')->nullable();
            $table->timestamps();
        });
        Schema::table('rpjmd_subbidang', function (Blueprint $table) {
            $table->foreign('id_rpjmd_bidang')->references('id')->on('rpjmd_bidang')->onDelete('SET NULL');
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
        Schema::table('rpjmd_subbidang', function (Blueprint $table) {
            $table->dropForeign('rpjmd_subbidang_id_sub_bidang_foreign');
            $table->dropForeign('rpjmd_subbidang_id_rpjmd_bidang_foreign');
        });
        Schema::dropIfExists('rpjmd_subbidang');
    }
}
