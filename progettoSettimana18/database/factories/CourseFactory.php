<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = fake()->dateTimeBetween('now', '+2 month');
        $end_time = clone $start_time;
        $end_time->modify('+1 hour');

        $data= ['Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica'];

        return [
            'title' => fake()->word(),
            'description' => fake()->text(200),
            'date' => fake()->randomElement($data),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

    }
}
