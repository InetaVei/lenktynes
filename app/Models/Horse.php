<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    public $fillable = ['horse_name', 'runs', 'wins', 'about'];

    public function bettors()
    {
        return $this->hasMany('App\Models\Bettor');
    }
}
