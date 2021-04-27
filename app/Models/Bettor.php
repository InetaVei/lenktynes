<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bettor extends Model
{
    use HasFactory;
    
    public $fillable = ['bettor_name', 'bettor_surname', 'bet', 'horse_id'];
    public function horse()
    {
        return $this->belongsTo('App\Models\Horse');
    }
}
