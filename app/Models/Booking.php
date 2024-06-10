<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'type',
        'date',
        'vehicle',
        'zone',
        'timing',
        'status',
        'package_option_nationality',
        'adults',
        'children',
        'rooms',
        'package_id',
        'package_option_id',
        'no_of_kids',
        'total',
        'state',
        'address',
        'payment_id',
        'proof_file',
        'payment_value',
        'hotel_id',
        'hotel_due_amount',
        'check_in',
        'check_out',
        'room_category',
        'meal_plan'
    ];

    public function user()
    {
        return $this->belongsTo(Customer::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function customers()
    {
        return $this->hasMany(BookingCustomers::class);
    }
}
