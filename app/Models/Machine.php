<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{
       use HasFactory;
       protected $fillable = [
        'Serial_Number',
        'make_model',
        'machine_type_id',
    ];
    
    public function machinework()
    {
        return $this->hasMany(MachineWork::class);
    }
    public function machineType()
    {
        return $this->belongsTo(MachineType::class, 'machine_type_id');
    }
}
