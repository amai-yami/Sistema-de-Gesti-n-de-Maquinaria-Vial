<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('Description');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            // Usar 'Province_id' como el nombre de la columna foránea
            $table->foreignId('province_id')
            ->nullable() // ← Importante: permitir NULL
            ->constrained()
            ->onDelete('set null'); // ← Esto evita que se borren trabajos

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
