<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageExclusion extends Model
{
    use HasFactory;

    public $fillable = ['package_id', 'description', 'exclusion_id' , 'status'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function exclusion()
    {
        return $this->belongsTo(Exclusion::class, 'exclusion_id');
    }
}
