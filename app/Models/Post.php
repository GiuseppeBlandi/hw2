<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {


    protected $fillable = [
        'user_id', 'content', 'nlikes'
    ];

    protected $casts = [
        'content' => 'array' 
    ];
    
    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    public function likes() {
        return $this->belongsToMany('App\Models\User');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}


?>