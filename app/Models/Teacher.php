<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_code',
        'teacher_name',
        'gender',
        'dob',
        'phone',
        'email',
        'biography',
        'address',
        'file_path'
    ];

    // Relationship with Gender
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    // Relationship with Schedule
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    // Relationship with Major
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relationship with Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}