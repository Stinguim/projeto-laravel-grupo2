<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use App\Models\CleaningRequest;
use App\Models\Lodging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CleaningController extends Controller
{
    public function showSchedule(){
        $user = Auth::user();
        $cleanings = Cleaning::query()
            ->join('cleaning_team_has_user', 'cleaning.cleaning_team_id', '=', 'cleaning_team_has_user.cleaning_team_id')
            ->join('cleaning_request', 'cleaning_request.id_cleaning_request', '=', 'cleaning.cleaning_request_id')
            ->join('lodging', 'lodging.id_lodging', '=', 'cleaning_request.lodging_id')
            ->join('user', 'cleaning_team_has_user.user_id', '=', 'user.id_user')
            ->join('cleaning_team', 'cleaning.cleaning_team_id', '=', 'cleaning_team.id_cleaning_team')
            ->join('company', 'company.id_company', '=','cleaning_team.company_id' )
        ;

//        if ($user->user_type == 'admin'){
//            $cleanings = $cleanings
//                ->select('date','lodging.name as lodging_name','lodging.id_lodging as lodging_id','address','estado as state','user.name as user_name','cleaning.cleaning_team_id as team_id')
//                ->get();
//            return view('schedule', ['cleanings' => $cleanings]);
//        }
//        if ($user->user_type == 'supervisor'){
//            $cleanings = $cleanings
//                ->select('date','lodging.name as lodging_name','descricao','id_user','id_cleaning_request as request_id','lodging.id_lodging as lodging_id','address','estado as state','user.name as user_name','cleaning.cleaning_team_id as team_id')
//                ->where('id_user',$user->id_user)
//                ->get();
//            return view('schedule', ['cleanings' => $cleanings]);
//        }
//        elseif($user->user_type == config("constants.roles")[3])
            $cleanings = $cleanings
                ->select('date','lodging.name as lodging_name',
                    'id_user','lodging.id_lodging as lodging_id',
                    'address','estado as state','user.name as user_name',
                    'cleaning.cleaning_team_id as team_id',
                    'company.name as company_name',
                    'descricao as description',
                    'cleaning_request_id as request_id')
                ->where('user.id_user',$user->id_user)
                ->get();
            return view("schedule", ['cleanings' => $cleanings]);
    }

    public function updateCleaningRequest($request_id){

        $request = Cleaning::where("cleaning_request_id", $request_id)->firstOrFail();

        $request->estado = 3;
        $request->save();

        return redirect()->back()->with("success", "Lodging Cleaned");
    }

}
?>
