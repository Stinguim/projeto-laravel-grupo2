<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Lodging;
use App\Models\CleaningRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
//        users, requests, accommodations

        $users = User::query()->count();
        $accommodations = Lodging::query()->count();
        $cleaningRequests = CleaningRequest::query()->count();
//        $counts = User::query()->select('user_type', DB::raw('COUNT(*) as total'))
//            ->groupBy('user_type')
//            ->get();

        return view("dashboard", ["users" => $users,
            "accommodations"=>$accommodations,
            "cleaningRequests"=>$cleaningRequests,
//            "counts"=>$counts
        ] );
    }
}
