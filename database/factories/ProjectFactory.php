<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ProjectCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_category_id' => ProjectCategory::inRandomOrder()->first()->id,
            'title' => $title = ucfirst(fake()->words(3, true)),
            'description' => fake()->paragraph(4),
            'client_name' => fake()->company(),
            'author' => fake()->name(),
            'keywords' => fake()->words(5),
            'date' => fake()->dateTimeBetween('-1 years', 'now'),
            'url' => fake()->url(),
            'is_active' => fake()->boolean(90),
            'slug' => Str::slug($title),
        ];
    }
}
