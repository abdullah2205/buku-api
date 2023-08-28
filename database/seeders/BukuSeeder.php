<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul' => 'Buku 1',
            'tahun' => 2022,
        ]);

        Buku::create([
            'judul' => 'Buku 2',
            'tahun' => 2023,
        ]);
    }
}
