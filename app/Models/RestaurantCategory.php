<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','restaurant_id'];

    protected $appends = [
            'category_name',
    ];

    public function restaurants(){
        return $this->belongsTo(restaurant::class,'restaurant_id');
    }
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function getCategorynameAttribute(){
        $data =  Category::where('id',$this->category_id)->first();
        return $data->category_name ?? "";

    }


}
