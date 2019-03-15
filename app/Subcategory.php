<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'category_parent';
    public function parent(){
        return $this->belongsTo('App\Category','category_id');
    }

}
