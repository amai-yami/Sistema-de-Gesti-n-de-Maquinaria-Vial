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
            Schema::create('machine_works', function (Blueprint $table) {
            $table->id();
            $table->string('Reason_for_end')->nullable();
            $table->integer('Mileage_traveled')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->foreignId('work_id')->constrained('works')->onDelete('cascade');
            $table->foreignId('machine_id')->constrained('machines')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_works');
    }
};
