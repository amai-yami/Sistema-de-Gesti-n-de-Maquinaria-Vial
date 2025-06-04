<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MachineWork;

class MachineWorkTableSeeder extends Seeder
{
    public function run(): void
    {
        MachineWork::factory(10)->create();  // Puedes ajustar el número según sea necesario
    }
}
