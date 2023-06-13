<?php

namespace App\src\AppHumanResources\Attendence\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'schedule_id',
        'date',
        'check_in',
        'check_out',
        'created_at',
        'updated_at'
    ];


    public function attendenceFaults(): HasMany
    {
        return $this->hasMany(AttendenceFaults::class);
    }
}
