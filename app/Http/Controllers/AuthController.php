<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register(){
        return "register form";
    }

    public function registerAction(Request $request){
        return "register action";
    }

    public function login() {
        // return "login form";
        return view('auth.login');
    }

    public function loginAction(Request $request) {
        // return "auth action";

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $field = $this->validate($request, $rules);

        // dd($field);
        
        $user = User::where('email', $field['email'])->first();

        if (auth()->attempt($field)) {
            return redirect()->to('/');
        }

        return back()->withErrors([
            'message' => 'The email or password is incorrect, please try again'
        ]);

    }

    public function logout(){
        // return "delete action";
        auth()->logout();
        return redirect()->to('/');
    }
}
