<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingCustomers extends Model
{
    use HasFactory;

    public $fillable = ['booking_id', 'type', 'name', 'age', 'gender', 'nationality', 'idproof', 'idproof_number'];

    public $timestamps = true;

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
