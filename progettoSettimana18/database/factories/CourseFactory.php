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
       
        $start_time = ['01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00', '24:00'];

        $random_index = array_rand($start_time);
        $random_start_time = $start_time[$random_index];
    
        $end_time_index = ($random_index + 1) % count($start_time);
        $end_time = $start_time[$end_time_index];
    
        $data = ['Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica'];
    
        $corsi = [
            "Body Pump", "Zumba", "Yoga", "Spinning", "Pilates", "CrossFit", "Aerobica", "Boxe Fitness", "Circuit Training", "Allenamento Funzionale", "HIIT", "Danza Fitness", "Kickboxing", "Tai Chi", "Allenamento con i pesi"
        ];
    
        return [
            'title' => $corsi[array_rand($corsi)],
            'description' => fake()->text(200),
            'date' => fake()->randomElement($data),
            'start_time' => $random_start_time,
            'end_time' => $end_time,
        ];
    }
}
