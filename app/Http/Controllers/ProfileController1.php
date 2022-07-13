<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class ProfileController1 extends Controller
{
    public function index(){

        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));

        return view('profile')->with("user", $user);
    }
}
?>