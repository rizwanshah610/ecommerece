<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total','status'];
    protected $table = 'orders';

    public function user(){
        return $this->belongsTo('App\User','user_id');

    }
    public function orderItems(){

     return $this->belongsToMany(Product::class)->withPivot('qty','total');

    }


}
