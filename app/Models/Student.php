<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'cod',
        'user_id',
        'birth_date',
        'age',
        'status'
       ];

       public $timestamp = true;

       public function user()
       {
           return $this->belongsTo(User::class);
       }


       public function grade()
       {
        return $this->belongsTo(Grade::class);
       }

       public function grade_student()
       {
        return $this->hasMany(GradeStudent::class);
       }

       public function evaluations()
        {
          return $this->hasMany(Evaluation::class);
        }

        public function payments()
        {
            return $this->hasMany(Payment::class);
        }
}
