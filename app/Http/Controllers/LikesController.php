<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;

class LikesController extends Controller
{
    public function AddLike(Request $request){
        if(session('user_id') == null ){
            return redirect('login');
        }
        $user = User::find(session('user_id'));

        Post::find($request->post_id)->likes()->where('user_id', $user);

        $like=Like::create([
            'user_id'=>$user->id,
            'post_id'=>$request->post_id,
        ]);
        $post = Post::find($request->post_id);

        return response()->json([
            'nlikes' => $post->nlikes
        ]);
    }

public function RemoveLike(Request $request){
        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));
        $post_id = $request->post_id;
        
        $like = Like::where('user_id', $user->id)->where('post_id', $post_id)->delete();

        $post = Post::find($post_id);

        return response()->json([
            'nlikes' => $post->nlikes
        ]);
    }

}
?>