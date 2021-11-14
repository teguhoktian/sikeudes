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

        $provinsi = \App\Models\Provinsi::where(['kode' => '32'])->first();

        \App\Models\Kabupaten::create([
            'nama' => 'Kabupaten Bandung',
            'kode' => '04',
            'id_provinsi' => $provinsi->id
        ]);

        \App\Models\Kabupaten::create([
            'nama' => 'Kabupaten Bandung Barat',
            'kode' => '17',
            'id_provinsi' => $provinsi->id
        ]);

        \App\Models\Kabupaten::create([
            'nama' => 'Kabupaten Cirebon',
            'kode' => '09',
            'id_provinsi' => $provinsi->id
        ]);
    }
}
