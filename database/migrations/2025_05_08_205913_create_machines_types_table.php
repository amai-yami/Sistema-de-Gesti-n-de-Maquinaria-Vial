<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machines_types', function (Blueprint $table) { // ✅ NOMBRE CORREGIDO
            $table->id();
            $table->string('type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machines_types'); // ✅ TAMBIÉN CORREGIDO
    }
};
