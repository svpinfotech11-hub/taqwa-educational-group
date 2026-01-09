<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxiBooking extends Model
{
    use HasFactory;

    protected $table = 'taxi_bookings';

    protected $fillable = [
        'student_name',
        'admission_number',
        'class',
        'parent_mobile',
        'parent_email',
        'booking_date',
        'number_of_persons',
    ];
}
