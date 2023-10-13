<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipCity extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function country(){
        return $this->belongsTo(ShipCountry::class , 'country_id' , 'id');
    }
}
