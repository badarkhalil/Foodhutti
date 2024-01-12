<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsRequest extends Model
{
    use HasFactory;
    protected $fillable = ['adtype','price','package_name','file_name','buzzintownmenu','payment_status','ad_status','restaurant_id','days','ad_date'];
    public $appends = [
            'Ads',
    ];

    public function restaurant(){
        return $this->belongsTo(restaurant::class);
    }
    public function getAdsAttribute(){
        return $this->restaurant()->get();
    }
}
