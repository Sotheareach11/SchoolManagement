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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code');
            $table->string('course_name');
            $table->string('syllabus');
            $table->integer('durations')->unsigned();
            $table->decimal('price', 6, 2);
            $table->string('description');
            $table->foreignId('course_id')->constrained('courses', 'id');
            $table->foreignId('major_id')->constrained('majors', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
