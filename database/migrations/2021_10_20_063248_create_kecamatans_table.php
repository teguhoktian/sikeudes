<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_kabupaten')->nullable();
            $table->string('kode', 2)->nullable();
            $table->string('nama', 100)->nullable();
            $table->timestamps();
        });

        Schema::table('kecamatan', function (Blueprint $table) {
            $table->foreign('id_kabupaten')->references('id')->on('kabupaten')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecamatan', function (Blueprint $table) {
            $table->dropForeign('kecamatan_id_kabupaten_foreign');
        });
        Schema::dropIfExists('kecamatan');
    }
}
