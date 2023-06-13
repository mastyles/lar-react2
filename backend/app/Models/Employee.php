<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function attendences(): HasMany
    {
        return $this->hasMany(Attendence::class);
    }

    public function attendenceFaults(): HasMany
    {
        return $this->hasMany(attendenceFaults::class);
    }
}
