<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    # Função para obter todos os utilizadores da base de dados
    public function index()
    {
        $search = request("search");
        if ($search) {
            $users = User::query()->where("name", "like", "%".$search."%")
                ->orWhere("surname", "like", "%".$search."%")
                ->orWhere("email", "like", "%".$search."%")
                ->get();
        }
        else {
            $users = User::all();
        }

        return view("all_users", ["users" => $users, "search" => $search]);
    }
    # Função para apenas mostrar a view com infos de um utilizador especifico para ser  editado
    public function edit($id){

        $user = User::findorFail($id);
        return view("edit_user", ["user" => $user]);
    }
    # Função para atualizar bd com os dados do form
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "surname" => "required|string|max:255",
            "email" => "required|email",
            "user_type" => "required|in:admin,supervisor,employ,client",
        ]);

        User::where("id_user", $id)->update($data);

        return redirect("/users");
    }

    public function settings(){
        $user = auth()->user();
        return view("settings", ["user" => $user]);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/login");
    }
}
