<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SumberDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SumberDana::create([
            'nama' => 'Pendapatan Asli Desa',
            'kode' => 'PAD'
        ]);

        \App\Models\SumberDana::create([
            'nama' => 'Alokasi Dana Desa',
            'kode' => 'ADD'
        ]);

        \App\Models\SumberDana::create([
            'nama' => 'Dana Desa (APBN)',
            'kode' => 'DDS'
        ]);

        \App\Models\SumberDana::create([
            'nama' => 'Penerimaan Bagi Hasil Pajak/Retribusi Daerah',
            'kode' => 'PBH'
        ]);

        \App\Models\SumberDana::create([
            'nama' => 'Penerimaan Bantuan Keuangan Kabupaten/Kota',
            'kode' => 'PBK'
        ]);

        \App\Models\SumberDana::create([
            'nama' => 'Penerimaan Bantuan Keuangan Provinsi',
            'kode' => 'PBP'
        ]);

        \App\Models\SumberDana::create([
            'nama' => 'Swadaya Masyarakat',
            'kode' => 'SWD'
        ]);

        \App\Models\SumberDana::create([
            'nama' => 'Pendapata Lain-Lain',
            'kode' => 'PDL'
        ]);
    }
}
