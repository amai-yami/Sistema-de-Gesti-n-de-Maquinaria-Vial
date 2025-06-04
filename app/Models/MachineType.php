<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineType extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla
    protected $table = 'machines_types';  // ✅ Esto es lo que falta agregar

    protected $fillable = [
        'type',
    ];

    public function machine()
    {
        return $this->hasMany(Machine::class);
    }
}
