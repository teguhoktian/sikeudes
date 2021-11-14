<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Hoki Teguh Oktian',
            'email' => 'oktian89@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$k.6QNJ2M2x06XflMG6YFUus8UMhdLs5Tlu.HJ2uCfYYMWSH8PJaSy', // password
            'remember_token' => Str::random(10)
        ]);
    }
}
