<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'grade_section',
    ];
    public $timestamp = true;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function grade_teacher()
    {
        return $this->hasOne(GradeTeacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function grade_student()
    {
        return $this->hasMany(GradeStudent::class);
    }
}
