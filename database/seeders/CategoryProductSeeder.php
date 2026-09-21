<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $reins = Category::where('name', 'Reins')->first();
        $coeurs = Category::where('name', 'Cœurs')->first();
        $poumons = Category::where('name', 'Poumons')->first();
        $foies = Category::where('name', 'Foies')->first();

        Product::where('name', 'Élodie')->first()->categories()->sync([
            $reins->id,
            $coeurs->id,
        ]);

        Product::where('name', 'Lucas')->first()->categories()->sync([
            $reins->id,
            $poumons->id,
        ]);

        Product::where('name', 'Maya')->first()->categories()->sync([
            $poumons->id,
            $foies->id,
        ]);

        Product::where('name', 'Sarah')->first()->categories()->sync([
            $coeurs->id,
            $foies->id,
        ]);

        Product::where('name', 'Noah')->first()->categories()->sync([
            $reins->id,
            $poumons->id,
        ]);

        Product::where('name', 'Lina')->first()->categories()->sync([
            $coeurs->id,
            $poumons->id,
        ]);

        Product::where('name', 'Thomas')->first()->categories()->sync([
            $reins->id,
            $foies->id,
        ]);

        Product::where('name', 'Camille')->first()->categories()->sync([
            $poumons->id,
            $foies->id,
        ]);

        Product::where('name', 'Nathan')->first()->categories()->sync([
            $reins->id,
            $coeurs->id,
        ]);
    }
}