<?php

namespace App\Models;

use App\Livewire\Administrator\GradesTeachers\GradesTeachers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_second_name',
        'first_second_last_name',
        'cedula',
        'inss',
        'phone_number',
        'email',
        'user_id',
        'status'
    ];

    public $timestamp = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function grade()
    {
        return $this->hasOne(GradeTeacher::class);
    }













}
