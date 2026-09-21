<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Reins',
            'description' => 'Catégorie dédiée aux reins.',
        ]);

        Category::create([
            'name' => 'Cœurs',
            'description' => 'Catégorie dédiée aux cœurs.',
        ]);

        Category::create([
            'name' => 'Poumons',
            'description' => 'Catégorie dédiée aux poumons.',
        ]);

        Category::create([
            'name' => 'Foies',
            'description' => 'Catégorie dédiée aux foies.',
        ]);
    }
}