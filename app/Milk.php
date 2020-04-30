<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milk extends Model
{
    protected $fillable = [
        'degree', 'cost', 'liter', 'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function milk_products(){
        return $this->hasMany(MilkProduct::class);
    }
}
