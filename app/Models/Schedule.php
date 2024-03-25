<?php

namespace App\Models;

use App\Models\Professional;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function professional(): BelongsTo
    {
        return $this->belongsTo(Professional::class);
    }

}
