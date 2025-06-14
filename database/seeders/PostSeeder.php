<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'user_id' => 1,
                'image' => 'https://picsum.photos/seed/' . $i . '/600/400',
                'text' => 'Contoh isi post ke-' . $i,
                'status' => $i % 2 == 0 ? 'public' : 'private',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'user_id' => 2,
                'image' => 'https://picsum.photos/seed/' . $i . '/600/400',
                'text' => 'Contoh isi post ke-' . $i,
                'status' => $i % 2 == 0 ? 'public' : 'private',
            ]);
        }

         for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'user_id' => 3,
                'image' => 'https://picsum.photos/seed/' . $i . '/600/400',
                'text' => 'Contoh isi post ke-' . $i,
                'status' => $i % 2 == 0 ? 'public' : 'private',
            ]);
        }
    }
}
