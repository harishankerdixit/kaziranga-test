<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory;

    protected $table = 'amenities';

    protected $fillable = ['amenity', 'image', 'status'];

    public function hotelAmenities()
    {
        return $this->hasOne(HotelAmenities::class);
    }
}
