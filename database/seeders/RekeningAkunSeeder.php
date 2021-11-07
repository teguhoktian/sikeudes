<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RekeningAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\RekeningAkun::create([
            'kode' => '1',
            'nama' => 'Aset',
        ]);

        \App\Models\RekeningAkun::create([
            'kode' => '2',
            'nama' => 'Kewajiban',
        ]);

        \App\Models\RekeningAkun::create([
            'kode' => '3',
            'nama' => 'Ekuitas',
        ]);

        \App\Models\RekeningAkun::create([
            'kode' => '4',
            'nama' => 'Pemdapatan',
        ]);

        \App\Models\RekeningAkun::create([
            'kode' => '5',
            'nama' => 'Belanja',
        ]);

        \App\Models\RekeningAkun::create([
            'kode' => '6',
            'nama' => 'Pembiayaan',
        ]);

        \App\Models\RekeningAkun::create([
            'kode' => '7',
            'nama' => 'Non Anggaran',
        ]);
    }
}
