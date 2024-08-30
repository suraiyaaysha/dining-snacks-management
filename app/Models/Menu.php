<?php

namespace App\Models;

use App\Models\Lunch;
use App\Models\Snack;
use App\Models\Manpower;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['day_of_week', 'manpower_id', 'snack_id', 'lunch_id'];

    public function manpower()
    {
        return $this->belongsTo(Manpower::class);
    }

    public function snack()
    {
        return $this->belongsTo(Snack::class);
    }

    public function lunch()
    {
        return $this->belongsTo(Lunch::class);
    }
}
