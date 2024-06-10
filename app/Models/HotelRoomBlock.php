<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomBlock extends Model
{
    use HasFactory;

    public $fillable = ['hotel_id', 'room_id','room_check_in','room_check_out'];

    public function room()
    {
        return $this->belongsTo(HotelRoom::class);
    }
}
