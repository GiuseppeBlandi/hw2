<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    protected $fillable = [
        'id','user_id', 'post_id', 'content'
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    public function post() {
        return $this->belongsTo("App\Models\Post");
    }

    public function getTimeAttribute(){
        return $this->created_at->diffForHumans(null, true, true);
    }
}

?>