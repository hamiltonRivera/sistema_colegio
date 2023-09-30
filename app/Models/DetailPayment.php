<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'description',
        'amount',
    ];

    public $timestamp = true;

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
