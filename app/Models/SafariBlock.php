<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafariBlock extends Model
{
    use HasFactory;

    protected $table = 'safari_block';

    protected $fillable = [
        'from',
        'to',
        'zone',
        'message',
    ];
}
