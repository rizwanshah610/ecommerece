<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Model
{

    use SoftDeletes;
    protected $fillable = ['title','description'];
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $table = 'categories';

    public function products(){
        return $this->hasMany('App\Product');
    }
    public function parents(){
        return $this->belongsToMany(Category::class,'category_parent','category_id','parent_id');
    }

    public function childrens(){
        return $this->belongsToMany(Category::class,'category_parent','parent_id','category_id');
    }

//    public function children(){
//        return $this->hasMany('App\Subcategory','id');
//    }
//
//    public function children() {
//        return $this->hasMany('App\Category', 'parent_id','category_id')->with('children'); //get all subs. NOT RECURSIVE
//    }
//    public function parent() {
//        return $this->belongsTo('App\Category', 'parent_id')->where('parent_id',0)->with('parent');
//    }
}
