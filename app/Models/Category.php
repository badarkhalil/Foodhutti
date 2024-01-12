<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $appends = [
        'restaurant',
    ];
    public function restaurant(){
        return $this->belongsToMany(restaurant::class,'restaurant_categories','category_id','restaurant_id');
    }
    public function getRestaurantAttribute(){
        return $this->restaurant()->distinct()->orderby('isfeature','desc')->orderby('created_at','desc')->get();
    }
}
