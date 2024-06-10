<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCategoryHotel extends Model
{
    use HasFactory;

    public $fillable = ['package_id', 'category_id', 'hotel_id'];

    public function category()
    {
        return $this->belongsTo(PackageCategory::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class)->with('images');
    }
}
