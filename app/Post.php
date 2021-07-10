<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Category;

class Post extends Model
{
    //    use ونحتاج ال dates لما نعمل سوفت دليت نحتاج ال  

    use softDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title', 'content', 'photo','user_id','slug','category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
   
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
