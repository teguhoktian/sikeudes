<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_kecamatan')->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('kode', 4)->nullable();
            $table->timestamps();
        });

        Schema::table('desa', function (Blueprint $table) {
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('desa', function (Blueprint $table) {
            $table->dropForeign('desa_id_kecamatan_foreign');
        });
        Schema::dropIfExists('desa');
    }
}
