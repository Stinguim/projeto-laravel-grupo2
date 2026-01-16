<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use App\Models\CleaningRequest;
use App\Models\CleaningTeam;
use App\Models\CleaningTeamHasUser;
use App\Models\Company;
use App\Models\Lodging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CleaningController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user = auth()->user();
        $roles = config('constants.roles');
        $permissions = config('constants.permissions');
        $permissions[$user->user_type] = true;
        $company = $company = Company::where("user_id", $user->id_user)->firstOrFail();
        $cleanings = [];
        if ($company != null) {
            $requests = CleaningRequest::all()->where("company_id", $company->id_company)
                ->where('state', config('constants.cleaningRequestsStates')[2]);
            foreach ($requests as $request) {
                $accommodation = Lodging::all()->firstWhere("id_lodging", $request->lodging_id);
                $cleanings[] = [
                    "id" => $request->id_cleaning_request,
                    "name" => $accommodation->name,
                    "address" => $accommodation->address,
                    "date" => $request->data_request,
                    "timeleft" => today()->diffInHours($request->data_request),
                ];
            }

            array_multisort(array_column($cleanings, 'timeleft'), SORT_ASC, $cleanings);
        }

        return view('cleaning.index',
            [
                "cleanings" => $cleanings,
            ]
        );
    }

    public function showCleaning($id){
        $cleaningRequest = CleaningRequest::query()->where('id_cleaning_request', $id)->get()[0];
        $employees = Company::query()->join('user', 'user.company_id', '=', 'company.id_company')
        ->where('company.id_company', $cleaningRequest->company_id)->get();

        return view('cleaning.cleaning', ['cleaningRequest'=>$cleaningRequest, 'employees'=>$employees]);
    }

    public function storeCleaning(Request $request){
        #criar a cleaning_team e depois criar a cleaning_team_has_user
        #criar o cleaning atraves do cleaning_request(id) e cleaning_team(id)
        $request->validate([
            'cleaning_request_id' => 'required|exists:cleaning_request,id_cleaning_request',
            'date' => 'required|date',
            'estado' => 'required',
            'team' => 'required|array|min:1'
        ]);

        $team = CleaningTeam::create([
            "company_id" => $request["company_id"],
        ]);

        $cleaningRequest = CleaningRequest::findOrFail($request->cleaning_request_id);

        // 1️ Create the team
        $teamMembers = $request->team; // array of user IDs from the form

        foreach($teamMembers as $userId) {
            CleaningTeamHasUser::query()->insert([
                'cleaning_team_id' => $team->id_cleaning_team,
                'user_id' => $userId,
            ]);
        }

        //Create the cleaning object
        $cleaning = Cleaning::create([
            'cleaning_request_id' => $cleaningRequest->id_cleaning_request,
            'cleaning_team_id' => $team->id_cleaning_team,
            'date' => $request->date,
            'estado' => $request->estado
        ]);

        return redirect("/schedule")->with('success', 'Cleaning created successfully!');
    }

    public function destroyCleaningRequest(Request $request,$request_id)
    {
        $user = Auth::user();

        // Apenas supervisor pode apagar
        if ($user->user_type !== 'supervisor') {
            abort(403);
        }

        $cleaning = CleaningRequest::where("cleaning_request_id", $request_id)
            ->where('data_request', $request->date,)
            ->firstOrFail();

//        // Não permitir apagar se já estiver concluída
//        if ($cleaning->estado === 'Done') {
//            abort(403);
//        }

        CleaningRequest::where("cleaning_request_id", $request_id)
            ->where('data_request', $request->date)
            ->delete();

        return redirect()->back()->with("success", "Cleaning deleted");
    }

    public function showSchedule(){
        $user = Auth::user();
        $cleanings = Cleaning::query()
            ->join('cleaning_team_has_user', 'cleaning.cleaning_team_id', '=', 'cleaning_team_has_user.cleaning_team_id')
            ->join('cleaning_request', 'cleaning_request.id_cleaning_request', '=', 'cleaning.cleaning_request_id')
            ->join('lodging', 'lodging.id_lodging', '=', 'cleaning_request.lodging_id')
            ->join('user', 'cleaning_team_has_user.user_id', '=', 'user.id_user')
            ->join('cleaning_team', 'cleaning.cleaning_team_id', '=', 'cleaning_team.id_cleaning_team')
            ->join('company', 'company.id_company', '=','cleaning_team.company_id' );
//
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
                    'cleaning.cleaning_request_id as request_id')
                ->where('user.id_user',$user->id_user)
                ->get();
            return view("schedule", ['cleanings' => $cleanings]);
    }

    public function updateCleaningRequest(Request $request, $request_id){

        $cleaning = Cleaning::where("cleaning_request_id", $request_id)->firstOrFail();

        // Não editar se já estiver concluída
        if ($cleaning->estado == config('constants.cleanStates')[2]) {
            abort(403);
        }

        Cleaning::where("cleaning_request_id", $request_id)->update(['estado' => $request->estado]);

        return redirect()->back()->with("success", "Cleaning updated successfully");
    }

    public function destroy(Request $request,$request_id)
    {
        $user = Auth::user();

        // Apenas supervisor pode apagar
        if ($user->user_type !== 'supervisor') {
            abort(403);
        }

        $cleaning = Cleaning::where("cleaning_request_id", $request_id)
            ->where('date', $request->date,)
            ->firstOrFail();

        // Não permitir apagar se já estiver concluída
        if ($cleaning->estado === 'Done') {
            abort(403);
        }

        Cleaning::where("cleaning_request_id", $request_id)
            ->where('date', $request->date)
            ->delete();

        return redirect()->back()->with("success", "Cleaning deleted");
    }

}
?>
