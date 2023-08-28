<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\User;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::first();
        // $user2 = User::find(2);

        Buku::create([
            'judul' => 'Buku 1',
            'tahun' => 2022,
            'user_id' => $user1->id,
        ]);

        // Buku::create([
        //     'judul' => 'Buku 2',
        //     'tahun' => 2023,
        //     'user_id' => $user2->id,
        // ]);
    }
}
