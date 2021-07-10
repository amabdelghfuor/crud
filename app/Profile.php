<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'profile_users';
    
    protected $fillable = [
        'city', 'gender', 'user_id','bio','facebook', 'photo'
    ];

    
    


  public function user(){

    return $this->belongsTo('App\User','user_id');

  }
    
   

  


}
