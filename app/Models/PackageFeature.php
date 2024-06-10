<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    use HasFactory;

    public $fillable = ['package_id', 'description', 'status', 'feature_id'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
}
