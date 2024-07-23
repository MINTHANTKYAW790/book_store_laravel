<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BooksFactory extends Factory
{
    protected $model = Books::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_number' => rand(1000, 2000),
            'name' => $this->faker->word(), // Use word() if it's a single-word name
            'price' => $this->faker->numberBetween(4000, 5000), // Use faker's numberBetween() for consistency
            'publishing_date' => $this->faker->date(),
            'description' => $this->faker->paragraph(), // Corrected to a method call
            'image' => $this->faker->imageUrl(), // Use imageUrl() if image is expected to be a URL
            'save_pdf' => $this->faker->fileExtension(), // Use fileExtension() or another appropriate method
            'deleted' => rand(0, 1),
            'author_id' => rand(1, 10),
            'genre_id' => rand(1, 5),
            'publishing_house_id' => rand(1, 5),
            'inserted_by' => rand(1, 2),
            'edition' => rand(1, 5),
        ];
        
    }
}
