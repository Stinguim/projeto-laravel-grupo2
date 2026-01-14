<?php

namespace App\Http\Controllers;
use App\Models\CleaningRequest;
use App\Models\User;
use App\Models\Lodging;
use App\Models\Company;
use App\Models\Cleaning;

class DashboardController extends Controller
{
    public function index()
    {
//        users, requests, accommodations


        $user = auth()->user();
        $roles = config('constants.roles');
        $permissions = config('constants.permissions');
        $cleanStates = config('constants.cleanStates');
        $permissions[$user->user_type] = true;
        $cleaningRequests = null;
        $users = null;
        $accommodations = null;
        $cleanCanceled = null;
        $cleanDoing = null;
        $cleanDone = null;
        $cleanToDo = null;
        if($permissions[$roles[0]])
        {
            $users = User::query()->count();
            $accommodations = Lodging::query()->count();
        }
        if($permissions[$roles[2]])
        {
            $company = Company::where("user_id", $user->id_user)->get()[0];
            $cleaningRequests = CleaningRequest::where("company_id", $company->id_company)->where("state", 1)->count();
            $cleanCanceled = Cleaning::where('estado', $cleanStates[0])->count();
            $cleanDoing = Cleaning::where('estado', $cleanStates[1])->count();
            $cleanDone = Cleaning::where('estado', $cleanStates[2])->count();
            $cleanToDo = Cleaning::where('estado', $cleanStates[3])->count();
        }
        $counts = User::query()->select('user_type', User::raw('COUNT(*) as total'))
            ->groupBy('user_type')
            ->get();

        return view("dashboard",
            [
                "users" => $users,
                "accommodations" => $accommodations,
                "cleaningRequests" => $cleaningRequests,
                "cleanDone" => $cleanDone,
                "cleanCanceled" => $cleanCanceled,
                "cleanDoing" => $cleanDoing,
                "cleanToDo" => $cleanToDo
            ]
        );
    }
}
