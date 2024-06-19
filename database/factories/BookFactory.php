<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_number' => rand(1000, 2000),
            'name' => $this->faker->name(),
            'price' => rand(4000, 5000),
            'publishing_date' => $this->faker->date(),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->name(),
            'save_pdf' => $this->faker->name(),
            'deleted' => rand(0, 1),
            'author_id' => rand(1, 10),
            'genre_id' => rand(1, 5),
            'publishing_house_id' => rand(1, 5),
            'inserted_by' => rand(1, 2),
            'edition' => rand(1, 5),
        ];
    }
}
