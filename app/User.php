<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function hasManyArticles(){
        return $this->hasMany('App\Article','userid','id');
    }
    public function showFollowing(){
       // return $this->belongsToMany('App\User', 'attention', 'user1_id', 'user2_id');
        return $this->hasMany('App\Attention','user1_id');
    }
    public function showFollowed(){
        //return $this->belongsToMany('App\User', 'attention', 'user2_id', 'user1_id');
        return $this->hasMany('App\Attention','user2_id');
    }
    public function hasManyCategorys(){
        return $this->hasMany('App\Category','userid','id');
    }
}
