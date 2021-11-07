<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RekeningKelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = \App\Models\RekeningAkun::where(['kode' => '1'])->first();

        \App\Models\RekeningKelompok::create([
            'nama' => 'Aset Lancar',
            'kode' => '1',
            'id_akun' => $akun->id
        ]);

        \App\Models\RekeningKelompok::create([
            'nama' => 'Investasi Jangka Panjang',
            'kode' => '2',
            'id_akun' => $akun->id
        ]);
    }
}
