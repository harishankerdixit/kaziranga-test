<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomAvailable extends Model
{
    use HasFactory;

    protected $table = 'hotel_rooms_available';

    public $fillable = ['hotel_id', 'room_id', 'breakfast_lunch', 'breakfast_lunch_dinner', 'room_check_in', 'room_check_out', 'status'];

    public function room()
    {
        return $this->belongsTo(HotelRoom::class);
    }
}
