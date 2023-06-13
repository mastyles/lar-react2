<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttendenceFault extends Model
{
    use HasFactory;

    public function attendences(): HasMany
    {
        return $this->hasMany(Attendence::class);
    }
}
