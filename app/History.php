<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'seller_id', 'total_cost',
    ];
    public function seller(){
        return $this->belongsTo(User::class);
    }
    public function history_items(){
        return $this->hasMany(HistoryItems::class);
    }
}
