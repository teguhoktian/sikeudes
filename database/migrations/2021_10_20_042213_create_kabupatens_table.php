<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_provinsi')->nullable();
            $table->string('kode', 2)->nullable();
            $table->string('nama', 100)->nullable();
            $table->timestamps();
        });

        Schema::table('kabupaten', function (Blueprint $table) {
            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kabupaten', function (Blueprint $table) {
            $table->dropForeign('kabupaten_id_provinsi_foreign');
        });
        Schema::dropIfExists('kabupaten');
    }
}
