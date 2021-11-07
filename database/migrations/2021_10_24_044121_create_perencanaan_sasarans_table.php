<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerencanaanSasaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perencanaan_sasaran', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_tujuan')->nullable();
            $table->string('kode', 2)->nullable();
            $table->text('uraian')->nullable();
            $table->timestamps();
        });

        Schema::table('perencanaan_sasaran', function (Blueprint $table) {
            $table->foreign('id_tujuan')->references('id')->on('perencanaan_tujuan')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_sasaran', function (Blueprint $table) {
            $table->dropForeign('perencanaan_sasaran_id_tujuan_foreign');
        });
        Schema::dropIfExists('perencanaan_sasaran');
    }
}
