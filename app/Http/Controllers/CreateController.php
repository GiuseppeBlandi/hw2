<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;

class CreateController extends Controller
{
    public function index(){

        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));

        return view('create')->with("user", $user);
    }

    function create_post() {
        $request = request();
        $user = User::find(session('user_id'));

        $newPost =  Post::create([
                    'content' => $request['text'],
                    'user_id' => $user->id,
                    ]);

        return redirect('home');
    }

}
?>