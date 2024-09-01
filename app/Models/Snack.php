<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\MenuAssignment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Snack extends Model
{
    use HasFactory;

    protected $fillable = ['item', 'time', 'quantity_per_person'];

    public function menuAssignments()
    {
        return $this->belongsToMany(MenuAssignment::class, 'menu_assignment_snack')
                    ->withPivot('time');
    }
    
}
