<?php

namespace App\Http\Controllers;
use App\Models\CleaningRequest;
use App\Models\User;
use App\Models\Lodging;
use App\Models\Company;

class DashboardController extends Controller
{
    public function index()
    {
//        users, requests, accommodations


        $user = auth()->user();
        $roles = config('constants.roles');
        $permissions = config('constants.permissions');
        $permissions[$user->user_type] = true;
        $cleaningRequests = null;
        $users = null;
        $accommodations = null;
        if($permissions[$roles[0]])
        {
            $users = User::query()->count();
            $accommodations = Lodging::query()->count();
        }
        if($permissions[$roles[3]])
        {
            $company = Company::where("user_id", $user->id_user)->get()[0];
            $cleaningRequests = CleaningRequest::where("company_id", $company->id_company)->count();
        }
//        $counts = User::query()->select('user_type', DB::raw('COUNT(*) as total'))
//            ->groupBy('user_type')
//            ->get();

        return view("dashboard",
            [
                "users" => $users,
                "accommodations" => $accommodations,
                "cleaningRequests" => $cleaningRequests
            ]
        );
    }
}
