<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryItems extends Model
{
    protected $fillable = [
        'history_id', 'product_type_id', "count", "cost"
    ];
    public function history(){
        return $this->belongsTo(History::class);
    }
    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }
}
