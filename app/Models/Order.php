<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function country(){
        return $this->belongsTo(ShipCountry::class , 'country_id' , 'id');
    }
    public function city(){
        return $this->belongsTo(ShipCity::class , 'city_id' , 'id');
    }
}
