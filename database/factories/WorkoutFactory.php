<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Workout;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workout>
 */
class WorkoutFactory extends Factory
{
    protected $model = Workout::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Aerobik', 'Boks', 'Karate', 'Step', 'Pilates', 'Joga']),
            'body_part' => $this->faker->randomElement(['Zglobovi', 'Kukovi', 'Ruke', 'Noge', 'Prsa', 'Ramena', 'Stomak', 'Leđa']),
            'workout_level' => $this->faker->numberBetween(1,10),
            'series_number' => $this->faker->numberBetween(1,5),
            'repetitions_number' => $this->faker->numberBetween(1,20),
            'calories_burned' => $this->faker->numberBetween(100,1000),
            'equipment' => $this->faker->numberBetween(1,3),
            'workout_period' => $this->faker->numberBetween(1,40),
            'trainer' => $this->faker->numberBetween(1,10),
        ];
    }
}
