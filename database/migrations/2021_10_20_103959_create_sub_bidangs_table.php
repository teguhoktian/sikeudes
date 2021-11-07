<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_bidang', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_bidang')->nullable();
            $table->string('kode', 2)->nullable();
            $table->string('nama')->nullable();
            $table->timestamps();
        });

        Schema::table('sub_bidang', function (Blueprint $table) {
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
        Schema::table('sub_bidang', function (Blueprint $table) {
            $table->dropForeign('sub_bidang_id_bidang_foreign');
        });
        Schema::dropIfExists('sub_bidang');
    }
}
