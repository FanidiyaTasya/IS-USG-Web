<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sheep>
 */
class SheepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'sheep_name' => $this->faker->unique()->name,
            'sheep_birth' => $this->faker->date(),
            // 'sheep_type' => $this->faker->randomElement(['Induk', 'Anak']),
            'sheep_gender' => $this->faker->randomElement(['Betina', 'Jantan']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
