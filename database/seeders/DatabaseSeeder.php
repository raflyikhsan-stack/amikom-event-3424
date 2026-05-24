<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
       \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $category = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $category2 = \App\Models\Category::firstOrCreate([
            'name' => 'Entertaiment',
            'slug' => 'entertaiment',
        ]);

        $category3 = \App\Models\Category::firstOrCreate([
            'name' => 'Workshop',
            'slug' => 'workshop',
        ]);
        
        // Event 1 - Entertainment
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Malam syahdu dengan alunan musik jazz merdu.',
            'date' => '2026-06-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 75000,
            'stock' => 150,
            'poster_path' => 'posters/event-1.png',
        ]);
        
        // Event 2 - Seminar IT
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        // Event 3 - Workshop
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain interface profesional dalam satu hari.',
            'date' => '2026-06-20 09:00:00',
            'location' => 'Lab ICT Amikom',
            'price' => 35000,
            'stock' => 50,
            'poster_path' => 'posters/event-3.png',
        ]);

        // Event 4 - Seminar IT
        \App\Models\Event::create([
            'category_id' => $category->id,
            'title' => 'Hackathon Unleash Your Inner Dev',
            'description' => 'Asah skill coding kamu di kompetisi bergengsi ini.',
            'date' => '2026-05-30 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 20000,
            'stock' => 200,
            'poster_path' => 'posters/event-4.png',
        ]);

        // Event 5 - Entertainment
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'E-Sport U-Champ Valorant',
            'description' => 'Turnamen e-sport terbesar tingkat universitas.',
            'date' => '2026-07-20 10:00:00',
            'location' => 'Basement Unit 3',
            'price' => 100000,
            'stock' => 16,
            'poster_path' => 'posters/event-5.png',
        ]);

        // Event 6 - Workshop
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Digital Marketing for Creators',
            'description' => 'Strategi membangun personal branding di sosial media.',
            'date' => '2026-08-12 14:00:00',
            'location' => 'Ruang Citra',
            'price' => 45000,
            'stock' => 80,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}