<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'author' => 'Alex',
            'content' => 'This barbershop is a hidden gem in City! The barbers are incredibly skilled and friendly. I
            always walk out feeling fresh and confident. Highly recommend for anyone who wants quality
            grooming.',
        ]);
        Testimonial::create([
            'author' => 'Alex',
            'content' => 'I\'ve tried many places before, but none compare to the atmosphere and precision here. The
            attention to detail is amazing, and the team really listens to what you want. I\'ll definitely be
            coming back!',
        ]);
        Testimonial::create([
            'author' => 'Alex',
            'content' => 'Professional service, clean space, and great vibes. I love how they combine traditional
            techniques with modern style. It\'s not just a haircut — it\'s a whole experience.',
        ]);
    }
}
