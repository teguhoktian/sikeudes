<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Desa::create([
            'nama' => 'Desa Kalianyar',
            'kode' => '2001',
            'id_kecamatan' => null
        ]);

        \App\Models\Desa::create([
            'nama' => 'Desa Panguragan Kulon',
            'kode' => '2002',
            'id_kecamatan' => null
        ]);

        \App\Models\Desa::create([
            'nama' => 'Desa Panguragan Wetan',
            'kode' => '2003',
            'id_kecamatan' => null
        ]);
    }
}
