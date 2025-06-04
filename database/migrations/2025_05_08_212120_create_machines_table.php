<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('Serial_Number')->unique(); // Aquí definimos la columna Serial_Number
            $table->string('make_model');
            $table->foreignId('machine_type_id')
            ->nullable() // ← Importante también
            ->constrained('machines_types')
            ->onDelete('set null'); // ← Evita que se borren las máquinas

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
