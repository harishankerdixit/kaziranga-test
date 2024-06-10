<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageForeignerOptions extends Model
{
    use HasFactory;

    public $fillable = [
        'package_id',
        'category_id',
        'price',
        'extra_beds',
        'extra_bed_ch',
        'fes_room_price',
        'fes_ad_price',
        'fes_ch_price',
        's_de_price',
        's_we_price',
        's_fe_price',
    ];

    public function category()
    {
        return $this->belongsTo(PackageCategory::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
