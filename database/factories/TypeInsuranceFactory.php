<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeInsurence>
 */
class TypeInsuranceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $elements = ["Santé", "Logement", "Subsistance"];
        return [
            'name' => fake()->randomElement($elements),
            'description' => fake()->text(50),
            'imagePath' => fake()->imageUrl(),
            'prix' => fake()->numberBetween()
        ];
    }
}
