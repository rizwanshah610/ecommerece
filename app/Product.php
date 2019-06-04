<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['title','description','image','size','category_id','price'];
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public  function category(){
        return $this->belongsTo('App\Category');
    }
}
