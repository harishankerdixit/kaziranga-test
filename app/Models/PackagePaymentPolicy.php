<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePaymentPolicy extends Model
{
    use HasFactory;

    protected $table = 'package_payment_policy';

    protected $fillable = [
        'description',
    ];
}
