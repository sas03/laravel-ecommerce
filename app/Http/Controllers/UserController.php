<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Parameter $req of type Request to get data from the form
    function login(Request $req){
        //return $req->input();
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            return "Username or password is not matched";
        }
        else{
            //$req->session = set an instance of a session accessed via http request
            //store $user data(from sql-request) in a session with 'user' as key
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    function register(Request $req){
        // Instance of User Model
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect('/login');
        //return $req->input();
    }
}
