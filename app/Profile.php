<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    protected $table = 'profiles';
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
//    public  function user(){
//        return $this->belongsTo('App\User');
//    }
}
