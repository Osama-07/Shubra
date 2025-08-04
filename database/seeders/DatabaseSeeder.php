<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('123'),
                'role' => 'admin'
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('123'),
                'role' => 'user'
            ]
        ]);


        Article::factory()->createMany([
            [
                'title' => "أهمية الصلاة في حياة المسلم",
                'content' => "تُعد الصلاة عمود الدين، وهي الصلة المباشرة بين العبد وربه، وتركها يُعد من الكبائر.",
                'user_id' => 1
            ],
            [
                'title' => "فضل قراءة القرآن الكريم",
                'content' => "القرآن الكريم شفاء للصدور وهداية للناس، وقراءته تعود على المسلم بالأجر والسكينة.",
                'user_id' => 1
            ]
        ]);
    }
}
