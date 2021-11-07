<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningObjeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening_objek', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary();
            $table->uuid('id_jenis')->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('kode', 2)->nullable();
            $table->timestamps();
        });

        Schema::table('rekening_objek', function (Blueprint $table) {
            $table->foreign('id_jenis')->references('id')->on('rekening_jenis')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekening_objek', function (Blueprint $table) {
            $table->dropForeign('rekening_objek_id_jenis_foreign');
        });
        Schema::dropIfExists('rekening_objek');
    }
}
