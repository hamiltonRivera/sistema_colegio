<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'user_id'
    ];

    public $timestamp = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estudents()
    {
        return $this->hasMany(Student::class);
    }

    public function getStudentsAsociated()
    {
        return $this->students()->pluck('name');
    }


}
