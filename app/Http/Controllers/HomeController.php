<?php

namespace App\Http\Controllers;

    use Illuminate\Routing\Controller as BaseController;
    use App\Models\User;
    use App\Models\Post;
    use App\Models\Comment;

    class HomeController extends BaseController
    {
        public function index(){

            if(session('user_id') == null ){
                return redirect('login');
            }

            $user = User::find(session('user_id'));

            return view('home')->with("user", $user);
        }
    }

?>
