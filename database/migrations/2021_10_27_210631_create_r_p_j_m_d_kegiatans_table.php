<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRPJMDKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmd_kegiatan', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_rpjmd_sub_bidang')->nullable();
            $table->uuid('id_kegiatan')->nullable();
            $table->uuid('id_sasaran')->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->string('keluaran', 100)->nullable();
            $table->string('sasaran_manfaat', 100)->nullable();
            $table->enum('pola', ['Swakelola', 'Kerjasama', 'Pihak Ketiga'])->nullable()->default(NULL);
            $table->timestamps();
        });

        Schema::table('rpjmd_kegiatan', function (Blueprint $table) {
            $table->foreign('id_rpjmd_sub_bidang')->references('id')->on('rpjmd_subbidang')->onDelete('SET NULL');
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan')->onDelete('SET NULL');
            $table->foreign('id_sasaran')->references('id')->on('perencanaan_sasaran')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rpjmd_kegiatan', function (Blueprint $table) {
            $table->dropForeign('rpjmd_kegiatan_id_sasaran_foreign');
            $table->dropForeign('rpjmd_kegiatan_id_kegiatan_foreign');
            $table->dropForeign('rpjmd_kegiatan_id_rpjmd_sub_bidang_foreign');
        });
        Schema::dropIfExists('rpjmd_kegiatan');
    }
}
