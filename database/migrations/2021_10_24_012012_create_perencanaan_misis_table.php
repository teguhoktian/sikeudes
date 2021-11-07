<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerencanaanMisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perencanaan_misi', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_visi')->nullable();
            $table->string('kode', 2)->nullable();
            $table->text('uraian')->nullable();
            $table->timestamps();
        });

        Schema::table('perencanaan_misi', function (Blueprint $table) {
            $table->foreign('id_visi')->references('id')->on('perencanaan_visi')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_misi', function (Blueprint $table) {
            $table->dropForeign('perencanaan_misi_id_visi_foreign');
        });
        Schema::dropIfExists('perencanaan_misi');
    }
}
