<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;


class RegisterController1 extends BaseController
{

    public function index() {
        if(session::get('user_id')){
            return redirect('home');
        }
        return view ('register')
        ->with('csrf_token', csrf_token());
        
    } 


    protected function create()
    {
        $request = request();

        if($this->countErrors($request) === 0) {
            $newUser =  User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => password_hash($request['password'], PASSWORD_BCRYPT),
            ]);
            if ($newUser) {
                Session::put('user_id', $newUser->id);
                return redirect('home');
            } 
            else {
                return redirect('register')->withInput();
            }
        }
        else 
            return redirect('register')->withInput();  
    }

    private function countErrors($data) {
        $error = array();
    
        if(empty($data['name']) || empty($data['surname']) || empty($data['username']) || empty($data['email'])
        || empty($data['password']) || empty($data['confirm_password'])){
            array_push($error, "Riempi tutti i campi");
        }

        # USERNAME
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            array_push($error, "Username non valido");
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                array_push($error, "Username già utilizzato");
            }
        }
        # PASSWORD
        if (strlen($data["password"]) < 8) {
            array_push($error , "Caratteri password insufficienti");
        } 
        # CONFERMA PASSWORD
        if (strcmp($data["password"], $data["confirm_password"]) != 0) {
            array_push($error , "Le password non coincidono");
        }
        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            array_push($error , "Email non valida");
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                array_push($error, "Email già utilizzata");
            }
        }

        return count($error);
    }

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

}

?>