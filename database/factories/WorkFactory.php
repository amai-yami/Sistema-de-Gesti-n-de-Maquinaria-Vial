<?php

namespace Database\Factories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;
class WorkFactory extends Factory
{
    protected $model = Work::class;

    public function definition(): array
    {
        return [
            'description' => 'example work description',
            'start_date' => now(),
            'end_date' => now()->addDays(30),
             'province_id' => Province::inRandomOrder()->first()->id ?? Province::factory(),
        ];
    }
}
