<?php

namespace App\Http\Controllers;
use App\Models\Lodging;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
//        users, requests, accommodations

        $users = User::query()->count("*");
        $accommodations = Lodging::query()->count("*");
        $cleaningRequests = CleaningRequest::query()->count("*");

        return view("dashboard", ["users" => $users, "accommodations"=>$accommodations, "cleaningRequests"=>$cleaningRequests] );
    }
}
