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
        $subBidang = \App\Models\SubBidang::where(['kode' => '01'])->first();

        \App\Models\Kegiatan::create([
            'kode' => '01',
            'nama' => 'Penyediaan Penghasilan Tetap dan Tunjangan Kepala Desa',
            'id_sub_bidang' => $subBidang->id
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '02',
            'nama' => 'Penyediaan Penghasilan Tetap dan Tunjangan Perangkat Desa',
            'id_sub_bidang' => $subBidang->id
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '02',
            'nama' => 'Penyediaan Jaminan Sosial bagi Kepala Desa dan Perangkat Desa',
            'id_sub_bidang' => $subBidang->id
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '04',
            'nama' => 'Penyediaan Operasional Pemerintah Desa (ATK, Honor PKPKD dan PPKD dll)',
            'id_sub_bidang' => $subBidang->id
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '05',
            'nama' => 'Penyediaan Tunjangan BPD',
            'id_sub_bidang' => $subBidang->id
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '06',
            'nama' => 'Penyediaan Operasional BPD (rapat, ATK, Makan Minum, Pakaian Seragam, Listrik dll) Penyediaan Insentif/Operasional RT/RW',
            'id_sub_bidang' => $subBidang->id
        ]);

        \App\Models\Kegiatan::create([
            'kode' => '06',
            'nama' => 'Lain-lain Sub Bidang Siltap dan Operasional Pemerintahan Desa',
            'id_sub_bidang' => $subBidang->id
        ]);
    }
}
