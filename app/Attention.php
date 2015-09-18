<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $table="attention";
    
    public function showFollowed(){
        return $this->belongsTo('App\User','id');
    }
}
