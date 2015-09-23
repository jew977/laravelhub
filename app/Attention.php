<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
class Attention extends Model
{
    protected $table="attention";
    
    public function belongsToManyUser(){
        return $this->belongsTo('App\User','id');
    }
   public function attentionSave($user1_id,$user2_id){
      
   }
}
