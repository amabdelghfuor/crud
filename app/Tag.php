<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag','user_id'];

    public function user(){

        return $this->belongsTo('App\User','user_id');
    
    }
    public function posts()
    {
        return $this->belongsToMany(Tag::class);
    }
}
