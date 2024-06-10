<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageBooking extends Model
{
    use HasFactory;

    protected $table = 'package_bookings';

    public $fillable = ['user_id', 'date', 'booking_type', 'timing', 'status', 'package_option_nationality', 'adults', 'children', 'rooms', 'package_id', 'package_option_id', 'no_of_kids', 'total', 'state', 'address', 'payment_id', 'proof_file'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
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
