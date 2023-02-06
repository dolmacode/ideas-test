<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Category;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'file',
        'author',
        'status',
        'category_id',
    ];

    protected $casts = [
        'created_at',
        'updated_at',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
