<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Userprof extends Model
{
    use HasFactory;

    protected $table = 'userprofs';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
