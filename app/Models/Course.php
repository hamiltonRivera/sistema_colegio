<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public $timestamp = true;

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teachers');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
