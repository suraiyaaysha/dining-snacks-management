<?php

namespace App\Models;

use App\Models\Lunch;
use App\Models\Snack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['day_of_week', 'morning_snack_ids', 'afternoon_snack_ids', 'lunch_ids'];

    // public function snack()
    // {
    //     return $this->belongsTo(Snack::class);
    // }

    // public function lunch()
    // {
    //     return $this->belongsTo(Lunch::class);
    // }

    public function morningSnacks()
    {
        return $this->belongsToMany(Snack::class, 'morning_snack_ids');
    }

    public function afternoonSnacks()
    {
        return $this->belongsToMany(Snack::class, 'afternoon_snack_ids');
    }

    public function lunchItems()
    {
        return $this->belongsToMany(Lunch::class, 'lunch_ids');
    }
    
}
