<?php

namespace App\Models;

use App\Models\Lunch;
use App\Models\Snack;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['date'];

    public function morningSnacks()
    {
        return $this->belongsToMany(Snack::class, 'menu_assignment_snack')
                    ->withPivot('time')
                    ->wherePivot('time', 'morning');
    }

    public function afternoonSnacks()
    {
        return $this->belongsToMany(Snack::class, 'menu_assignment_snack')
                    ->withPivot('time')
                    ->wherePivot('time', 'afternoon');
    }

    public function lunchItems()
    {
        return $this->belongsToMany(Lunch::class, 'menu_assignment_lunch');
    }

}
