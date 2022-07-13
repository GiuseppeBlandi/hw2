<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        'username', 'password', 'email', 'name', 'surname'
    ];


    protected $hidden = [
        'password'
    ];


    public function posts() {
        return $this->hasMany("App\Models\Post");
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function likedPosts() {
        return $this->belongsToMany('App\Models\Post', 'likes');
    }
}
?>