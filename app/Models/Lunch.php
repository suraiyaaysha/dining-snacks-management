<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lunch extends Model
{
    use HasFactory;

    protected $fillable = ['item', 'quantity_per_person'];
    
}
