<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RekeningJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelompok = \App\Models\RekeningKelompok::where(['kode' => '1'])->first();

        \App\Models\RekeningJenis::create([
            'nama' => 'Kas',
            'kode' => '1',
            'id_kelompok' => $kelompok->id
        ]);

        \App\Models\RekeningJenis::create([
            'nama' => 'Investasi Jangka Pendek',
            'kode' => '2',
            'id_kelompok' => $kelompok->id
        ]);

        \App\Models\RekeningJenis::create([
            'nama' => 'Piutang',
            'kode' => '3',
            'id_kelompok' => $kelompok->id
        ]);

        \App\Models\RekeningJenis::create([
            'nama' => 'Persediaan',
            'kode' => '4',
            'id_kelompok' => $kelompok->id
        ]);
    }
}
