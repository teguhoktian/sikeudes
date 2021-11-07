<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SubBidang::create([
            'nama' => 'Penyelenggaran Belanja Siltap, Tunjangan dan Operasional Pemerintahan Desa',
            'kode' => '01'
        ]);

        \App\Models\SubBidang::create([
            'nama' => 'Penyediaan Sarana Prasarana Pemerintahan Desa',
            'kode' => '02'
        ]);

        \App\Models\SubBidang::create([
            'nama' => 'Pengelolaan Administrasi Kependudukan, Pencatatan Sipil, Statistik dan Kearsipan',
            'kode' => '03'
        ]);

        \App\Models\SubBidang::create([
            'nama' => 'Penyelenggaraan Tata Praja Pemerintahan, Perencanaan, Keuangan dan Pelaporan',
            'kode' => '04'
        ]);

        \App\Models\SubBidang::create([
            'nama' => 'Pertanahan',
            'kode' => '05'
        ]);
    }
}
