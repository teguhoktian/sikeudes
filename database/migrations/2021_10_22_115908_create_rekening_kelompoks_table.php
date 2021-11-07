<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningKelompoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening_kelompok', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_akun')->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('kode', 2)->nullable();
            $table->timestamps();
        });

        Schema::table('rekening_kelompok', function (Blueprint $table) {
            $table->foreign('id_akun')->references('id')->on('rekening_akun')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekening_kelompok', function (Blueprint $table) {
            $table->dropForeign('rekening_kelompok_id_akun_foreign');
        });
        Schema::dropIfExists('rekening_kelompok');
    }
}
