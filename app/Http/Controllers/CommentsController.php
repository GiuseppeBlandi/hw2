<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index(Request $request)
    {
        $comment = Comment::create([
            'content' =>  ['text' => $request->comment],
            'user_id' => Session::get('user_id'),
            'post_id' => $request->post_id,
        ]);

        $comments = Post::find($request->post_id)->comments()->get();
        return $comments->load(['user:id,username,name,surname']);
    }

    public function show($id)
    {
        return Post::findOrFail($id)->comments()->get()->load(['user:id,username,name,surname']);
        
    }


}

?>
