<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Provinsi::create([
                'nama' => 'Jawa Barat',
                'kode' => '32'
            ]);
    }
}
