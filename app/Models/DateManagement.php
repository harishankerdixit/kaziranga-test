<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'mode',
        'time',
        'status',
        'zone'
    ];
}
