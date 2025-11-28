<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create_account()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        /* Isto é a validação*/
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        /* Isto é para inserir  na Database */
        /* Atualizar com a base de dados que se tem */
        $user = User::create([
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => Hash::make($request['password']),
        ]);

        Auth::login($user);

        /* isto tem de se corrigir e trocar do debaixo por este
        return redirect(RouteServiceProvider::);
        */
        return redirect("/");
    }

    public function authenticate(Request $request){

        $user = User::create([
            "name" => $request['name'],
            "email" => $request['email'],
            "password" => $request['password'],
        ]);

        Auth::login($user);
        return redirect("/");
    }

    public function show(){

    }
}
