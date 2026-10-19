<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = collect([
            'Catatan Perkembangan Masjid',
            'Arsip Foto Lama Masjid',
            'Kisah Tokoh Sekitar Masjid',
            'Tradisi yang Lestari di Masjid',
        ])->random();

        return [
            'category_id' => Category::inRandomOrder()->first()?->id,
            'user_id' => null,
            'title' => $title,
            'slug' => Str::slug($title . '-' . Str::random(4)),
            'excerpt' => $this->faker->sentence(14),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(3)) . '</p>',
            'thumbnail' => null,
            'status' => 'published',
            'is_featured' => false,
            'published_at' => now()->subDays(rand(1, 60)),
            'seo_title' => null,
            'meta_description' => null,
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}