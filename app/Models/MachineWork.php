<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',       
        'work_id',           
        'Reason_for_end',
        'Mileage_traveled',
        'start_date',
        'end_date',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
