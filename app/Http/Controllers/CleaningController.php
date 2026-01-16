<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use App\Models\CleaningRequest;
use App\Models\CleaningTeam;
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

        return view('cleaning.cleaning', ['cleaningRequest'=>$cleaningRequest]);
    }

    public function updateCleaning(){
        #criar o cleaning atraves do cleaning request
    }

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

    public function updateCleaningRequest(Request $request, $request_id){

        $cleaning = Cleaning::where("cleaning_request_id", $request_id)->firstOrFail();

        // Não editar se já estiver concluída
        if ($cleaning->estado == config('constants.cleanStates')[2]) {
            abort(403);
        }

        Cleaning::where("cleaning_request_id", $request_id)->update(['estado' => $request->estado]);

        return redirect()->back()->with("success", "Cleaning updated successfully");
    }

    public function destroy($request_id)
    {
        $user = Auth::user();

        // Apenas supervisor pode apagar
        if ($user->user_type !== 'supervisor') {
            abort(403);
        }

        $cleaning = Cleaning::where("cleaning_request_id", $request_id)->firstOrFail();

        // Não permitir apagar se já estiver concluída
        if ($cleaning->estado === 'Done') {
            abort(403);
        }

        Cleaning::where("cleaning_request_id", $request_id)->delete();

        return redirect()->back()->with("success", "Cleaning deleted");
    }


}
?>
