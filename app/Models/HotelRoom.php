<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;

    public $fillable = ['hotel_id', 'room', 'image', 'status'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function facilities()
    {
        return $this->hasMany(HotelRoomFacilities::class, 'room_id');
    }

    public function benefits()
    {
        return $this->hasMany(HotelRoomBenefit::class, 'room_id');
    }

    public function roomPrice()
    {
        return $this->hasOne(HotelRoomAvailable::class, 'room_id');
    }
    public function roomBlock()
    {
        return $this->hasOne(HotelRoomBlock::class, 'room_id');
    }
}
