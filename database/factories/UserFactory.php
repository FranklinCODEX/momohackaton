<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ["Célibataire", "Marié", "Fiancé", "Veuve", "Veuf"];
        return [
            'fullName' => fake()->name() . '    ' . fake()->lastName(),
            'email' => fake()->email(),
            'password' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            'phoneNumber' => fake()->phoneNumber(),
            'profileImagePath' => fake()->imageUrl(),
            'livingAddress' => fake()->address(),
            'profession' => fake()->jobTitle(),
            'statusMatrimonial' =>  fake()->randomElement($status),
            'birthday' => fake()->date(),
            'nationalCardID' => fake()->randomNumber(),
            'revenuAnnuel' => fake()->numberBetween(),
            'remember_token' => Str::random(10),
            'admin' => false
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
