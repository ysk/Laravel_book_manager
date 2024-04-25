<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Userprof extends Model
{
    use HasFactory;

    protected $table = 'userprofs';

    protected $fillable = [
        'prof_thumbnail	',
        'address',
        'github_url',
        'prof_text',
    ];


}
