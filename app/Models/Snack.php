<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Snack extends Model
{
    use HasFactory;

    protected $fillable = ['item', 'time', 'quantity_per_person'];

    // public function menus()
    // {
    //     return $this->hasMany(Menu::class);
    // }
}
