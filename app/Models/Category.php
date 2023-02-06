<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'images',
        'status',
    ];

    protected $casts = [
        'created_at',
        'updated_at',
    ];
}
