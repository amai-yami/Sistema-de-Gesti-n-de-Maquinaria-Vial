<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Asegúrate de que el campo se llama correctamente sin espacios
    ];

    // Relación: una provincia puede tener muchos trabajos
    public function works()
    {
        return $this->hasMany(Work::class, 'Province_id'); // Asegúrate de que 'Province_id' sea el nombre de la clave foránea
    }
}
