<?php

namespace App\Http\Controllers;
use App\Models\CleaningRequest;
use App\Models\User;
use App\Models\Lodging;
use App\Models\Company;
use App\Models\Cleaning;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $roles = config('constants.roles');
        $permissions = config('constants.permissions');
        $cleanStates = config('constants.cleanStates');
        $requestsStates = config('constants.cleaningRequestsStates');
        $permissions[$user->user_type] = true;
        $cleaningRequests = null;
        $users = null;
        $accommodations = null;
        $cleanCanceled = null;
        $cleanDoing = null;
        $cleanDone = null;
        $cleanToDo = null;

        // Define-se o que cada user pode ver através das permissões dos roles
        if($permissions[$roles[0]])
        {
            $users = User::query()->count();
            $accommodations = Lodging::query()->count();
        }
        if($permissions[$roles[2]])
        {
            $company = Company::where("user_id", $user->id_user)->get()[0];
            $cleaningRequests = [
                "pending" => CleaningRequest::where("company_id", $company->id_company)
                    ->where("state", $requestsStates[0])->count(),
                "approved" => CleaningRequest::where("company_id", $company->id_company)
                    ->where("state", $requestsStates[2])->count(),
                "denied" => CleaningRequest::where("company_id", $company->id_company)
                    ->where("state", $requestsStates[1])->count()
            ];
            $cleanCanceled = Cleaning::where('estado', $cleanStates[0])->count();
            $cleanDoing = Cleaning::where('estado', $cleanStates[1])->count();
            $cleanDone = Cleaning::where('estado', $cleanStates[2])->count();
            $cleanToDo = Cleaning::where('estado', $cleanStates[3])->count();
        }
        if ($permissions[$roles[3]]) {

            $cleaningRequests = Cleaning::query()
                ->join(
                    'cleaning_team_has_user',
                    'cleaning.cleaning_team_id',
                    '=',
                    'cleaning_team_has_user.cleaning_team_id'
                )
                ->where('cleaning_team_has_user.user_id', $user->id_user)
                ->where('cleaning.estado', 'To do')
                ->count();
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
