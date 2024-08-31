<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manpower extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift_a',
        'shift_general',
        'shift_b',
        'shift_c',
        'total',
        'date'
    ];
}
