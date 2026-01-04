<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'service',
        'doctor',
        'name',
        'email',
        'appointment_date',
        'appointment_time',
    ];
}
