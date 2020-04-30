<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilkProduct extends Model
{
    protected $fillable = [
        'milk_id', 'product_type_id', 'count',
    ];
    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }
    public function milk(){
        return $this->belongsTo(MilkProduct::class);
    }

}
