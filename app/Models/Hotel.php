<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'rating',
        'status',
        'price',
        'price_type',
        'city',
        'state',
        'homepage',
        'review',
        'review_status',
        'property_type',
        'address',
        'description',
        'meta_title',
        'meta_description',
        'image',
        'thumb_alt',
        'package_image',
        'package_alt',
        'gallery_alt',
    ];

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class, 'hotel_id');
    }

    public function images()
    {
        return $this->hasMany(HotelImages::class, 'hotel_id');
    }

    public function amenities()
    {
        return $this->hasMany(HotelAmenities::class, 'hotel_id')->with('amenity');
    }

    public function getPriceAttribute()
    {
        return $this->attributes['price'] / 100;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function enquiry()
    {
        return $this->hasMany(Enquiry::class, 'hotel_id');
    }

    public function categoryHotels()
    {
        return $this->hasMany(PackageCategoryHotel::class, 'hotel_id');
    }
}
