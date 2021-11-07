<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFooterPerencanaanVisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perencanaan_visi', function (Blueprint $table) {
            $table->string('tempat', 30)->nullable();
            $table->date('tanggal_penetapan')->nullable();
            $table->uuid('id_kepala_desa')->nullable();
            $table->foreign('id_kepala_desa')->references('id')->on('kepala_desa')->onDelete('SET NULL');
            $table->uuid('id_sekretaris_desa')->nullable();
            $table->foreign('id_sekretaris_desa')->references('id')->on('sekretaris_desa')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_visi', function (Blueprint $table) {
            $table->dropColumn('tempat');
            $table->dropColumn('tanggal_penetapan');
            $table->dropForeign('perencanaan_visi_id_sekretaris_desa_foreign');
            $table->dropColumn('id_sekretaris_desa');
            $table->dropForeign('perencanaan_visi_id_kepala_desa_foreign');
            $table->dropColumn('id_kepala_desa');
        });
    }
}
