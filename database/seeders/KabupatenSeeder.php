<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Kabupaten::create([
            'nama' => 'Kabupaten Bandung',
            'kode' => '04',
            'id_provinsi' => null
        ]);

        \App\Models\Kabupaten::create([
            'nama' => 'Kabupaten Bandung Barat',
            'kode' => '17',
            'id_provinsi' => null
        ]);
    }
}
