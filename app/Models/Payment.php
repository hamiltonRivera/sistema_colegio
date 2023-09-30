<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'grade_id',
        'date',
        'total'
    ];



    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function detail_payment()
    {
       return $this->hasMany(DetailPayment::class);
    }



}
