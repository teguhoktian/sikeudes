<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupaten = \App\Models\Kabupaten::where(['kode' => '09'])->first();

        \App\Models\Kecamatan::create([
            'nama' => 'Kecamatan Arjawinangun',
            'kode' => '24',
            'id_kabupaten' => $kabupaten->id
        ]);

        \App\Models\Kecamatan::create([
            'nama' => 'Kecamatan Panguragan',
            'kode' => '25',
            'id_kabupaten' => $kabupaten->id
        ]);

        \App\Models\Kecamatan::create([
            'nama' => 'Kecamatan Waled',
            'kode' => '01',
            'id_kabupaten' => $kabupaten->id
        ]);

        \App\Models\Kecamatan::create([
            'nama' => 'Kecamatan Sumber',
            'kode' => '15',
            'id_kabupaten' => $kabupaten->id
        ]);
    }
}
