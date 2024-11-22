<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operator;
use Faker\Factory as Faker;


class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');
    
    foreach (range(1, 10) as $index) { // Crea 10 operatori
        Operator::create([
            'name' => $faker->name,
            'is_available' => $faker->boolean(80), // 80% di probabilità che l'operatore sia disponibile
        ]);
    }
    }
}
