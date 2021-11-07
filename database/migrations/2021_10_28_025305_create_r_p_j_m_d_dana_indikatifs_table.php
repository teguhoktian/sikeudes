<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRPJMDDanaIndikatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmd_dana_indikatif', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_rpjmd_tahun_kegiatan')->nullable();
            $table->uuid('id_pelaksana_kegiatan')->nullable();
            $table->uuid('id_sumber_dana')->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->integer('volume')->unsigned()->nullable();
            $table->string('satuan', 32)->nullable();
            $table->string('waktu', 32)->nullable();
            $table->bigInteger('biaya')->unsigned()->nullable();
            $table->enum('pola', ['Swakelola', 'Kerjasama', 'Pihak Ketiga'])->nullable()->default(NULL);
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->timestamps();
        });

        Schema::table('rpjmd_dana_indikatif', function (Blueprint $table) {
            $table->foreign('id_rpjmd_tahun_kegiatan')->references('id')->on('rpjmd_tahun_kegiatan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pelaksana_kegiatan')->references('id')->on('pelaksana_kegiatan')->onDelete('SET NULL');
            $table->foreign('id_sumber_dana')->references('id')->on('sumber_dana')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rpjmd_dana_indikatif', function (Blueprint $table) {
            $table->dropForeign('rpjmd_dana_indikatif_id_sumber_dana_foreign');
            $table->dropForeign('rpjmd_dana_indikatif_id_pelaksana_kegiatan_foreign');
            $table->dropForeign('rpjmd_dana_indikatif_id_rpjmd_tahun_kegiatan_foreign');
        });
        Schema::dropIfExists('rpjmd_dana_indikatif');
    }
}
