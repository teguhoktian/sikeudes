<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RekeningObjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = \App\Models\RekeningJenis::where(['kode' => '1'])->first();

        \App\Models\RekeningObjek::create([
            'nama' => 'Kas di Rekening Kas Desa',
            'kode' => '01',
            'id_jenis' => $jenis->id
        ]);

        \App\Models\RekeningObjek::create([
            'nama' => 'Kas di Rekening Bendahara Desa',
            'kode' => '02',
            'id_jenis' => $jenis->id
        ]);

        \App\Models\RekeningObjek::create([
            'nama' => 'Kas Lainnya',
            'kode' => '03',
            'id_jenis' => $jenis->id
        ]);

        \App\Models\RekeningObjek::create([
            'nama' => 'Setara Kas',
            'kode' => '04',
            'id_jenis' => $jenis->id
        ]);
    }
}
