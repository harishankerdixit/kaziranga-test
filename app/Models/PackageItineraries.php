<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItineraries extends Model
{
    use HasFactory;

    protected $table = 'package_itineraries';

    public $fillable = ['package_id', 'title', 'content', 'iternary_id'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function iternary()
    {
        return $this->belongsTo(Iternary::class, 'iternary_id');
    }
}
