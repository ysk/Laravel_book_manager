<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];


    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function book(): hasMany
    {
        return $this->hasOne(Book::class);
    }
}
