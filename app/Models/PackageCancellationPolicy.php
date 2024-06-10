<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCancellationPolicy extends Model
{
    use HasFactory;

    protected $table = 'package_cancellation_policy';


    protected $fillable = [
        'description',
    ];
}
