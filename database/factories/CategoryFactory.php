<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryName = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($categoryName,'-');
        return [
            'name' => $categoryName,
            'slug' => $slug
        ];
    }
}
