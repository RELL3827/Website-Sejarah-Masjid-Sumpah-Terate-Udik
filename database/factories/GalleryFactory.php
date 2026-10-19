<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->sentence(10),
            'image' => 'images/masjid/placeholder.jpg',
            'category' => $this->faker->randomElement(Gallery::categories()),
            'year' => (string) $this->faker->year(),
            'is_active' => true,
        ];
    }
}