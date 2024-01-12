<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['file_name','restaurant_id','image_for'];

    public function restaurant(){
        return $this->belongsTo(restaurant::class,'restaurant_id');
    }
}
