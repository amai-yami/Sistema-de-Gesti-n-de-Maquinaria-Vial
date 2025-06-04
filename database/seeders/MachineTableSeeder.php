<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Machine;

class MachineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public $model = Machine::class;

    public function run(): void
    {
         Machine::factory(10)->create();
    }
}
