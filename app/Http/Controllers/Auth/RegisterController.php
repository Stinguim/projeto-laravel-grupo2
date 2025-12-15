<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{

    public function showRegister(){
        return view("auth.register");
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'user_type' => 'required|string',
        ]);

        $user = User::create([
            "name" => $request['name'],
            "surname" => $request['surname'],
            "email" => $request['email'],
            "password" => $request['password'],
            "user_type" => $request['user_type'],
            "company_id" => null,
        ]);

        Auth::login($user);

        return redirect("/dashboard");

    }

    public function showLogin(){
        return view("auth.authenticate");
    }

    public function login(Request $request){
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

        throw ValidationException::withMessages([
            'credentials'=> 'Not the correct credentials',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
