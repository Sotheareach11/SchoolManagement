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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('address');
            $table->string('photo');
            $table->foreignId('gender_id')->constrained('genders', 'id');
            $table->foreignId('schedule_id')->constrained('schedules', 'id');
            $table->foreignId('major_id')->constrained('majors', 'id');
            $table->foreignId('course_id')->constrained('courses', 'id');
            $table->foreignId('subject_id')->constrained('subjects', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
