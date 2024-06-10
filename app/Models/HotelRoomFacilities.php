<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomFacilities extends Model
{
    use HasFactory;

    public $fillable = ['hotel_id', 'room_id', 'facility'];

    public function room()
    {
        return $this->belongsTo(HotelRoom::class);
    }
}
