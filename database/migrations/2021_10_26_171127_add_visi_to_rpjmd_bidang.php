<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisiToRpjmdBidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rpjmd_bidang', function (Blueprint $table) {
            $table->uuid('id_visi')->nullable();
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
        Schema::table('rpjmd_bidang', function (Blueprint $table) {
            $table->dropForeign('rpjmd_bidang_id_visi_foreign');
            $table->dropColumn('id_visi');
        });
    }
}
