<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function show_register(){
        return view("auth.register");
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            "name" => $request['name'],
            "surname" => $request['surname'],
            "email" => $request['email'],
            "password" => $request['password'],
            "user_type" => "client",
            "company_id" => null,
        ]);

        Auth::login($user);

//        return redirect("/primeira")->with('username', $user) ;
        return redirect("/dashboard");

    }

    public function show_login(){
        return view("auth.authenticate");
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();
            $username = $user->name .' '. $user->surname;

            return redirect("/dashboard");
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function layoutmainview(){
        $username = $_GET['$user'];

        return redirect()->route('segunda.view')->with('username', $username);
    }

    public function homepageview(){
        $username = $_GET['$user'];
        return view('/dashboard', compact('username'));
    }
}
