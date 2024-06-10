<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name',
        'slug',
        'rating',
        'price',
        'description',
        'meta_title',
        'meta_description',
        'image',
        'status'
    ];

    public $timestamps = true;

    public function getPriceAttribute()
    {
        return $this->attributes['price'] / 100;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function features()
    {
        return $this->hasMany(PackageFeature::class, 'package_id');
    }

    public function inclusions()
    {
        return $this->hasMany(PackageInclusion::class, 'package_id');
    }

    public function exclusions()
    {
        return $this->hasMany(PackageExclusion::class, 'package_id');
    }

    public function categories()
    {
        return $this->hasMany(PackageCategory::class, 'package_id');
    }

    public function available_categories()
    {
        return $this->hasMany(PackageCategory::class, 'package_id')->where('status', 1);
    }

    public function iternaries()
    {
        return $this->hasMany(PackageItineraries::class, 'package_id');
    }

    // public function festivalPackages()
    // {
    //     return $this->hasMany(FestivalPackagePackage::class, 'package_id');
    // }
    
    public function bookingPackages()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }
}
