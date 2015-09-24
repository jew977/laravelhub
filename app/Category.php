<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    
    
    public function category_belongsToMany_user(){
        return $this->belongsToMany('App\User','id','typeid');
    }
    public function Category_hasMany_Articles(){
        return $this->hasMany('App\Article','typeid');
    }
}
