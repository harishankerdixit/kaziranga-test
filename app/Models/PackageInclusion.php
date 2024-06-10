<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageInclusion extends Model
{
    use HasFactory;

    public $fillable = ['package_id', 'description', 'inclusion_id', 'status'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function inclusion()
    {
        return $this->belongsTo(Inclusion::class, 'inclusion_id');
    }
}
