<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\MachineType; // Asegúrate de importar MachineType
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
    protected $model = Machine::class;

    public function definition()
    {
        return [
            'Serial_Number' => $this->faker->unique()->numberBetween(1000, 9999),
            'make_model' => $this->faker->word,
            'machine_type_id' => MachineType::inRandomOrder()->first()->id, // Esto asigna un machine_type_id válido
        ];
    }
}