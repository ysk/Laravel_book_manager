<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    /**
     * 書籍とカテゴリは１対１の関係
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }
}
