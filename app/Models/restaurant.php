<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['restaurant_name','location','area',
                            'home_delivery','description','user_id','breakfast'
                            ,'hitea','lunch_buffet','dinner_buffet','alacate','count','contact','cellno','brunch_menu','lat','lng','slug'    ];
    protected $appends = [
                'images',
                'profile_image',
                'category'
    ];


    public function categories(){
        return $this->belongsToMany(Category::class,'restaurant_categories','restaurant_id','category_id');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function getImagesAttribute(){
        return $this->images()->get();
    }
    public function getProfileImageAttribute(){
        return Image::where('restaurant_id', $this->id)->where('image_for',4)->first();
    }
    public function getCategoryAttribute(){
        return RestaurantCategory::where('restaurant_id',$this->id)->get();
    }
    public function restaurant(){
        return $this->hasMany(AdsRequest::class,'restaurant_id');
    }
    public function setRestaurantNameAttribute($value)
    {
        $this->attributes['restaurant_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);

        // Check if the generated slug is unique and add a number to make it unique if needed
        $i = 1;
        while (static::whereSlug($this->attributes['slug'])->exists()) {
            $this->attributes['slug'] = Str::slug($value) . '-' . $i++;
        }
    }
}
