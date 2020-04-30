<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = [
        'name', 'count', 'cost', 'image',
    ];
    public function milk_products(){
        return $this->hasMany(MilkProduct::class);
    }
    public function history_items(){
        return $this->hasMany(HistoryItems::class);
    }
}
