<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'name' => 'Hair Cut',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Hair Wash',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Hair Color',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Hair Shave',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Hair Straight',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Facial',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Shampoo',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Beard Trim',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Beard Shave',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Wedding Cut',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Clean Up',
            'price' => 9.99,
        ]);
        Price::create([
            'name' => 'Massage',
            'price' => 9.99,
        ]);
    }
}
