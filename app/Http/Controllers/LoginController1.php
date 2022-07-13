<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController1 extends Controller
{
    public function login() {
        if(session('user_id') != null) {
            return redirect("home");
        }
        else {
            return view('login')
            ->with('csrf_token', csrf_token());
        }
     }

     public function checkLogin() {
         $user = User::where('username', request('username'))
                ->first();

         if($user !== null) {
            if(password_verify(request('password'), $user->password)){

             Session::put('user_id', $user->id);
             return redirect('home');
            }
         }
         else {
             return redirect('login')->withInput();
         }
     }

     public function logout() {
         Session::flush();
         return redirect('login');
     }
}
?>