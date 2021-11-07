<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekretarisDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekretaris_desa', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_desa')->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('jabatan', 100)->nullable();
            $table->enum('aktif', ['Ya', 'Tidak'])->default('Tidak');
            $table->timestamps();
        });

        Schema::table('sekretaris_desa', function (Blueprint $table) {
            $table->foreign('id_desa')->references('id')->on('desa')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sekretaris_desa', function (Blueprint $table) {
            $table->dropForeign('sekretaris_desa_id_desa_foreign');
        });
        Schema::dropIfExists('sekretaris_desa');
    }
}
