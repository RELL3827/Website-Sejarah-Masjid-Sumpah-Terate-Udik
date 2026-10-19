<?php

namespace Database\Factories;

use App\Models\Timeline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Timeline>
 */
class TimelineFactory extends Factory
{
    protected $model = Timeline::class;

    public function definition(): array
    {
        return [
            'year' => (string) $this->faker->year(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'image' => null,
            'sort_order' => $this->faker->numberBetween(0, 50),
            'is_active' => true,
        ];
    }
}