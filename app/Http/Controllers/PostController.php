<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class PostController extends Controller
{
    public function index(){

        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));

        $posts = Post::join('users', 'users.id', '=', 'posts.user_id')
                       ->orderBy('posts.time', 'DESC')
                       ->get(['users.id as userid', 'users.name as name',
                             'users.surname as surname', 'users.username', 'posts.id as postid',
                             'posts.time as time', 'posts.content as content', 'posts.nlikes as nlikes',
                             'posts.ncomments as ncomments']);

        foreach($posts as $post){
            $like = Like::where('post_id', $post->postid)->where('user_id', $user->id)->first();
            if(!$like){
                $post['liked'] = false;
            }
            else{
                $post['liked'] = true;
            }
        }

        return $posts;
    }
    
}

?>

