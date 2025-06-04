<?php

namespace Database\Factories;

use App\Models\MachineWork;
use App\Models\Machine;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MachineWork>
 */
class MachineWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'work_id' => Work::factory(),  // Asegúrate de que se cree un work_id
            'machine_id' => Machine::factory(),  // Asegúrate de que se cree un machine_id
            'Reason_for_end' => $this->faker->sentence(),
            'Mileage_traveled' => $this->faker->numberBetween(1000, 10000),
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
