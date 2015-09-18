<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table="articles";
    protected $fillable = array('title','content','type','desc','userid','author','typeid');
    public function showCategory(){
        return $this->belongsTo('Category','typeid');
    }
    
    public function belongsToUser(){
        return $this->belongsTo('App\User','id','userid');
    }
    
    public function show_article_category(){
        return $this->belongsTo('App\Category','id');
    }
}
