<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnackRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'time',
    ];
}
