<?php

namespace Database\Seeders;

use App\Models\Barber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barber::factory()->count(4)->create();
    }
}
