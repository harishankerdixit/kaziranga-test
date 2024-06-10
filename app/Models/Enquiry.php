<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table='enquiries';

    protected $fillable = ['type', 'booking_date', 'time_slot', 'safari_type', 'traveller_name', 'mobile_no', 'email_id', 'message', 'hotel_id','package_id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
