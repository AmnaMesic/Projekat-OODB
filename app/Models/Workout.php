<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'name',
        'body_part',
        'workout_level',
        'series_number',
        'repetitions_number',
        'equipment',
        'workout_period',
        'calories_burned',
        'trainer',
    ];
}
