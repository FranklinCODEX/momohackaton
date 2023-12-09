<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use Illuminate\Support\Str;
use App\Models\TypeInsurance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'fullName' => 'Admin',
            'email' => 'admin2023@gmail.com',
            'password' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            'phoneNumber' => "22966149987",
            'profileImagePath' => fake()->imageUrl(),
            'livingAddress' => fake()->address(),
            'profession' => fake()->jobTitle(),
            'statusMatrimonial' => "Célibataire",
            'birthday' => fake()->date(),
            'nationalCardID' => fake()->randomNumber(),
            'revenuAnnuel' => fake()->numberBetween(),
            'remember_token' => Str::random(10),
            'admin' => true
        ]);

        User::factory(5)->create();
        TypeInsurance::factory(3)->create();

    }
}
