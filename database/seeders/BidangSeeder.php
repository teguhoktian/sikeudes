<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Bidang::create([
            'nama' => 'Penyelenggaraan Pemerintahan Desa',
            'kode' => '01',
        ]);

        \App\Models\Bidang::create([
            'nama' => 'Pelaksanaan Pembangunan Desa',
            'kode' => '02',
        ]);

        \App\Models\Bidang::create([
            'nama' => 'Pembinaan Kemasyarakatan',
            'kode' => '03',
        ]);

        \App\Models\Bidang::create([
            'nama' => 'Pemberdayaan Masyarakat',
            'kode' => '04',
        ]);

        \App\Models\Bidang::create([
            'nama' => 'Penanggulangan Bencana, Darurat dan Mendesak Desa',
            'kode' => '05',
        ]);
    }
}
