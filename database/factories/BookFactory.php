<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'is_active' => $this->faker->boolean(),
            'age_range_max' => $this->faker->randomNumber(),
            'age_range_min' => $this->faker->randomNumber(),
            'author' => $this->faker->word(),
            'cover_image' => $this->faker->word(),
            'description' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->word(),

            'category_id' => Category::factory(),
        ];
    }
}
