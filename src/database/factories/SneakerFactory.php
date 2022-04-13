<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sneaker>
 */
class SneakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->words(2, TRUE)),
            'user_id' => User::inRandomOrder()->first()->id,
            'image' => $this->faker->randomElement(['https://images.stockx.com/images/Air-Jordan-1-Mid-Light-Smoke-Grey-Anthracite-Product.jpg?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&trim=color&q=90&dpr=2&updated_at=1643276910', 'https://images.stockx.com/images/Air-Jordan-11-Retro-Cool-Grey-2021-Product.jpg?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&trim=color&q=90&dpr=2&updated_at=1631898423', 'https://images.stockx.com/images/Air-Jordan-1-Retro-High-OG-Bred-Patent-Product.jpg?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&trim=color&q=90&dpr=2&updated_at=1633542046', 'https://images.stockx.com/images/Nike-Dunk-Low-Retro-White-Black-2021-Product.jpg?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&trim=color&q=90&dpr=2&updated_at=1633027409']),
            'style' => $this->faker->randomNumber(5, true),
            'size' => $this->faker->numberBetween(39, 46),
            'cost' => $this->faker->numberBetween(90, 200),
            'stockx' => true,
            'restocks' => $this->faker->boolean(),
        ];
    }
}
