<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;
use App\Models\Province;

class WorkTableSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = Province::all();

        foreach ($provinces as $province) {
            Work::factory()->create([
                'province_id' => $province->id,
            ]);
        }
    }
}
