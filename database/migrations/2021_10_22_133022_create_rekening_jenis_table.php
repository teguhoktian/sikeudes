<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening_jenis', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_kelompok')->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('kode', 2)->nullable();
            $table->timestamps();
        });

        Schema::table('rekening_jenis', function (Blueprint $table) {
            $table->foreign('id_kelompok')->references('id')->on('rekening_kelompok')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekening_jenis', function (Blueprint $table) {
            $table->dropForeign('rekening_jenis_id_kelompok_foreign');
        });
        Schema::dropIfExists('rekening_jenis');
    }
}
