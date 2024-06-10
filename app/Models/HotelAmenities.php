<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelAmenities extends Model
{
    use HasFactory;

    protected $table = 'hotel_amenities';

    public $fillable = ['hotel_id', 'amenity_id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function amenity()
    {
        return $this->belongsTo(Amenities::class, 'amenity_id');
    }
}
