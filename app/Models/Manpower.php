<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manpower extends Model
{
    use HasFactory;

    protected $fillable = [ 'shift', 'count' ];

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
