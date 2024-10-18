<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('radiologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('initial_assessments');
            $table->string('ultrasound_image');
            $table->string('pregnancy_status');
            $table->integer('gestational_age');
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiologies');
    }
};
