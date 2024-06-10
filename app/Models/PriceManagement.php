<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'mode',
        'start',
        'end',
        'indian',
        'foreigner',
        'status'
    ];

    public function getIndianAttribute()
    {
        return $this->attributes['indian'] / 100;
    }

    public function setIndianAttribute($value)
    {
        $this->attributes['indian'] = $value * 100;
    }

    public function getForeignerAttribute()
    {
        return $this->attributes['foreigner'] / 100;
    }

    public function setForeignerAttribute($value)
    {
        $this->attributes['foreigner'] = $value * 100;
    }
}
