<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function offer(){
        return $this->hasMany(Offer::class);
    }
}
