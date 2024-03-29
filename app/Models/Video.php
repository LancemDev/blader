<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'original_file_path',
        'thumbnail_path',
        'user_id',
        'tags',
    ];
}
