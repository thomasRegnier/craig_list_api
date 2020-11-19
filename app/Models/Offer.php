<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'city_id',
        'category_id',
        'subcategory_id',
        'slug'
    ];


    public function city(){
        return $this->belongsTo(city::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(subCategory::class, 'subcategory_id');
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function hidens(){
        return $this->hasMany(Hiden::class);
    }
}
