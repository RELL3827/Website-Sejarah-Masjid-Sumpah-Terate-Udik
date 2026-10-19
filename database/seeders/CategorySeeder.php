<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Sejarah', 'description' => 'Artikel tentang perjalanan dan latar belakang sejarah masjid.'],
            ['name' => 'Tokoh', 'description' => 'Profil dan kisah tokoh yang berperan dalam sejarah masjid.'],
            ['name' => 'Arsitektur', 'description' => 'Dokumentasi dan kajian arsitektur bangunan masjid.'],
            ['name' => 'Budaya', 'description' => 'Tradisi, adat, dan nilai budaya yang hidup di sekitar masjid.'],
            ['name' => 'Tradisi', 'description' => 'Tradisi keagamaan dan kemasyarakatan yang lestari di masjid.'],
            ['name' => 'Dokumentasi', 'description' => 'Arsip foto, dokumen, dan rekaman peristiwa terkait masjid.'],
            ['name' => 'Perkembangan Masjid', 'description' => 'Perkembangan fisik, pengelolaan, dan fungsi masjid dari masa ke masa.'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                $category + ['slug' => Str::slug($category['name'])]
            );
        }
    }
}