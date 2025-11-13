<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_location',
        'end_location',
        'distance',
        'duration',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
