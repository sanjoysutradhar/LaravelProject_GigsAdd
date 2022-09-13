<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    // show register/create form
    public function create(){
        return view('users.register');
    }

    //create new user
    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=> 'required|confirmed|min:6',
        ]);
        //Hash Password
        $formFields['password']=bcrypt($formFields['password']);
        //Create User
        $user=User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message','User created and logged in');
    }

    //user logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','you have been logged out');
    }
    public function login(){
        return view('users.login');
    }

    //authecticate user
    public function authecticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=> 'required',
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','you are now logged in');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }

}
