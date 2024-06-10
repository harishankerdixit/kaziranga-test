<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    use HasFactory;

    public $fillable = ['package_id', 'category', 'status'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function hotels()
    {
        return $this->hasMany(PackageCategoryHotel::class, 'category_id');
    }

    public function indian_options()
    {
        return $this->hasMany(PackageIndianOption::class, 'category_id');
    }

    public function foreigner_options()
    {
        return $this->hasMany(PackageForeignerOptions::class, 'category_id');
    }
}
