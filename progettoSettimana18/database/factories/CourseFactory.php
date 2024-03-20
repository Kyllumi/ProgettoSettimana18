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

        $data = ['Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica'];

        $corsi = [
            "Body Pump", "Zumba", "Yoga", "Spinning", "Pilates", "CrossFit", "Aerobica", "Boxe Fitness", "Circuit Training", "Allenamento Funzionale", "HIIT", "Danza Fitness", "Kickboxing", "Tai Chi", "Allenamento con i pesi"
        ];

        return [
            'title' => fake()->randomElement($corsi),
            'description' => fake()->text(200),
            'date' => fake()->randomElement($data),
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];

    }
}
