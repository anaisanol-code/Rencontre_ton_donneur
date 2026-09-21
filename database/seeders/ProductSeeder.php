<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Élodie',
            'description' => 'Profil fictif disponible en Guyane.',
            'price' => 99.90,
            'gender' => 'Femme',
            'age' => 25,
            'height' => 1.70,
            'weight' => 65,
            'blood_type' => 'O+',
            'region' => 'Guyane',
            'status' => 'available',
            'available' => true,
            'premium' => false,
        ]);

        Product::create([
            'name' => 'Lucas',
            'description' => 'Profil fictif disponible en Guyane.',
            'price' => 149.90,
            'gender' => 'Homme',
            'age' => 31,
            'height' => 1.80,
            'weight' => 75,
            'blood_type' => 'A+',
            'region' => 'Guyane',
            'status' => 'available',
            'available' => true,
            'premium' => true,
        ]);

        Product::create([
            'name' => 'Maya',
            'description' => 'Profil fictif disponible en Martinique.',
            'price' => 129.90,
            'gender' => 'Femme',
            'age' => 28,
            'height' => 1.68,
            'weight' => 62,
            'blood_type' => 'B+',
            'region' => 'Martinique',
            'status' => 'available',
            'available' => true,
            'premium' => false,
        ]);

        Product::create([
            'name' => 'Sarah',
            'description' => 'Profil fictif disponible en Guadeloupe.',
            'price' => 119.90,
            'gender' => 'Femme',
            'age' => 24,
            'height' => 1.65,
            'weight' => 60,
            'blood_type' => 'AB+',
            'region' => 'Guadeloupe',
            'status' => 'available',
            'available' => true,
            'premium' => false,
        ]);

        Product::create([
            'name' => 'Noah',
            'description' => 'Profil fictif disponible à La Réunion.',
            'price' => 139.90,
            'gender' => 'Homme',
            'age' => 29,
            'height' => 1.78,
            'weight' => 72,
            'blood_type' => 'O-',
            'region' => 'Réunion',
            'status' => 'available',
            'available' => true,
            'premium' => true,
        ]);

        Product::create([
            'name' => 'Lina',
            'description' => 'Profil fictif disponible en Guyane.',
            'price' => 109.90,
            'gender' => 'Femme',
            'age' => 26,
            'height' => 1.67,
            'weight' => 61,
            'blood_type' => 'A-',
            'region' => 'Guyane',
            'status' => 'available',
            'available' => true,
            'premium' => false,
        ]);

        Product::create([
            'name' => 'Thomas',
            'description' => 'Profil fictif disponible en Martinique.',
            'price' => 159.90,
            'gender' => 'Homme',
            'age' => 34,
            'height' => 1.82,
            'weight' => 80,
            'blood_type' => 'B+',
            'region' => 'Martinique',
            'status' => 'available',
            'available' => true,
            'premium' => true,
        ]);

        Product::create([
            'name' => 'Camille',
            'description' => 'Profil fictif disponible en Guadeloupe.',
            'price' => 124.90,
            'gender' => 'Femme',
            'age' => 30,
            'height' => 1.72,
            'weight' => 67,
            'blood_type' => 'O+',
            'region' => 'Guadeloupe',
            'status' => 'available',
            'available' => true,
            'premium' => false,
        ]);

        Product::create([
            'name' => 'Nathan',
            'description' => 'Profil fictif disponible à La Réunion.',
            'price' => 144.90,
            'gender' => 'Homme',
            'age' => 27,
            'height' => 1.76,
            'weight' => 70,
            'blood_type' => 'AB+',
            'region' => 'Réunion',
            'status' => 'available',
            'available' => true,
            'premium' => false,
        ]);
    }
}