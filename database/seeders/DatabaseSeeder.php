<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama' => 'Banjir',      'ikon' => '🌊', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sampah',      'ikon' => '🗑️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Lampu Jalan', 'ikon' => '💡', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jalan Rusak', 'ikon' => '🚧', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
