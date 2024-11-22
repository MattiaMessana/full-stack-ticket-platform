<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Operator;
use App\Models\Category;
use Faker\Factory as Faker;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');
    
    foreach (range(1, 20) as $index) { // Crea 20 ticket
        Ticket::create([
            'title' => $faker->sentence,
            'description' => $faker->paragraph,
            'status' => $faker->randomElement(['open', 'in_progress', 'closed']),
            'operator_id' => Operator::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
        ]);
    }
    }
}
