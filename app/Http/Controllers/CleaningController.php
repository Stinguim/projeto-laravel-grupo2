<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use App\Models\Lodging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CleaningController extends Controller
{
    public function showSchedule(){
        $user = auth::user();
        $cleanings = Cleaning::query()
            ->join('cleaning_team_has_user', 'cleaning.cleaning_team_id', '=', 'cleaning_team_has_user.cleaning_team_id')
            ->join('cleaning_request', 'cleaning_request.id_cleaning_request', '=', 'cleaning.cleaning_request_id')
            ->join('lodging', 'lodging.id_lodging', '=', 'cleaning_request.lodging_id')
            ->join('user', 'cleaning_team_has_user.user_id', '=', 'user.id_user');

        if ($user->user_type == 'admin'){
            $cleanings = $cleanings
                ->select('date','lodging.name as lodging_name','lodging.id_lodging as lodging_id','address','estado as state','user.name as user_name','cleaning.cleaning_team_id as team_id')
                ->get();
            return view('schedule', ['cleanings' => $cleanings]);
        }
        elseif ($user->user_type == 'supervisor'){
            $cleanings = $cleanings
                ->select('date','lodging.name as lodging_name','descricao','id_user','id_cleaning_request as request_id','lodging.id_lodging as lodging_id','address','estado as state','user.name as user_name','cleaning.cleaning_team_id as team_id')->where('id_user',$user->id_user)
                ->get();
        }
        else
            $cleanings = $cleanings
                ->select('date','lodging.name as lodging_name','id_user','lodging.id_lodging as lodging_id','address','estado as state','user.name as user_name','cleaning.cleaning_team_id as team_id')
                ->where('user.id_user',$user->id_user)
                ->get();
            return view("schedule", ['cleanings' => $cleanings]);
    }

    public function showScheduleLodging($id){
        $accommodations = Lodging::query()
            ->join('cleaning_request', 'cleaning_request.lodging_id', '=', 'lodging.id_lodging')
            ->join('cleaning', 'cleaning.cleaning_request_id', '=', 'cleaning_request.id_cleaning_request')
            ->select('id_lodging','date','address','estado as state','cleaning_team_id as team_id','description','name', 'descricao','cleaning_request_id')
            ->findOrFail($id);

        return view('lodging', ['lodging' => $accommodations]);
    }

    public function showCleaningRequests(){
        $user = auth::user();

    }

}
?>
