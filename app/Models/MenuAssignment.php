<?php

namespace App\Models;

use App\Models\Lunch;
use App\Models\Snack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['day_of_week', 'snack_id', 'lunch_id'];

    public function snack()
    {
        return $this->belongsTo(Snack::class);
    }

    public function lunch()
    {
        return $this->belongsTo(Lunch::class);
    }
}
