<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory; 

    protected $dates = [
        'published_at'
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'item_thumbnail',
        'item_name',
        'item_number',
        'item_amount',
        'item_review',
        'published_at'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
