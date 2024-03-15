<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    public function create(){
        return view('users.register');
    }
    public function store(Request $request){
        $formfields = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6',

        ]);

        //hash password
        $formfields['password']= bcrypt($formfields['password']);

        $user = User::create($formfields);

        auth()->login($user);

        return redirect('/')->with('message','user created and logged in successfully');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','You have been logout');

    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formfield =$request->validate([
            'email'=>['required','email'],
            'password'=>['required','min:6']

        ]);
        if(auth()->attempt($formfield)){
            $request->session()->regenerate();
            return redirect('/')->with('message','you have logged in successfully');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }
}
