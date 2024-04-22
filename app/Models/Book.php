<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


class Book extends Model
{
    use HasFactory; 

    protected $dates = [
        'published'
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'item_name',
        'item_number',
        'item_amount',
        'item_review',
        'published'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    

    public function getPublishedAttribute($value)
    {
        return Carbon::parse($value);
    }

}
