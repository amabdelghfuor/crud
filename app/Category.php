<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Post;

class Category extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title', 'photo','slug','user_id'
    ];

    public function post(){

        return $this->belongsToMany('App\Post');
    
    }

    public function user(){

        return $this->belongsTo('App\User','user_id');
    
    }
}
