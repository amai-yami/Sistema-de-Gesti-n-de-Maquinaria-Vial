<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MachineWork;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'Description',
        'start_date',
        'end_date',
        'province_id',  // Asegúrate de agregar esta columna
    ];

    // Relación: un trabajo pertenece a una provincia
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

   public function machinework()
{
    return $this->hasMany(MachineWork::class);
}
}
