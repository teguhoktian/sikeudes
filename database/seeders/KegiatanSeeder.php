<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kegiatan::create([
            'kode' => '01',
            'nama' => 'Penyediaan Penghasilan Tetap dan Tunjangan Kepala Desa'
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '02',
            'nama' => 'Penyediaan Penghasilan Tetap dan Tunjangan Perangkat Desa'
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '02',
            'nama' => 'Penyediaan Jaminan Sosial bagi Kepala Desa dan Perangkat Desa'
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '04',
            'nama' => 'Penyediaan Operasional Pemerintah Desa (ATK, Honor PKPKD dan PPKD dll)'
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '05',
            'nama' => 'Penyediaan Tunjangan BPD'
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '06',
            'nama' => 'Penyediaan Operasional BPD (rapat, ATK, Makan Minum, Pakaian Seragam, Listrik dll) Penyediaan Insentif/Operasional RT/RW'
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '06',
            'nama' => 'Lain-lain Sub Bidang Siltap dan Operasional Pemerintahan Desa'
        ]);
    }
}
