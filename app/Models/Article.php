<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'desc', 'img', 'views', 'status', 'pdf', 'publish_date'];



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // relasi ke kategory
    // public function category(): BelongsTo
    // {
    //     return $this->belongsTo(Category::class, 'Category_id', 'name');
    // }
    
}
