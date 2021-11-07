<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerencanaanTujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perencanaan_tujuan', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_misi')->nullable();
            $table->string('kode', 2)->nullable();
            $table->text('uraian')->nullable();
            $table->timestamps();
        });

        Schema::table('perencanaan_tujuan', function (Blueprint $table) {
            $table->foreign('id_misi')->references('id')->on('perencanaan_misi')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_tujuan', function (Blueprint $table) {
            $table->dropForeign('perencanaan_tujuan_id_misi_foreign');
        });
        Schema::dropIfExists('perencanaan_tujuan');
    }
}
