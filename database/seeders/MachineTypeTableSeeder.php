<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MachineType;

class MachineTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public $model = MachineType::class;

    public function run(): void
    {
         MachineType::factory(10)->create();
    }
}
