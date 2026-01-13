<?php

namespace App\Http\Controllers;

use App\Models\CleaningRequest;
use App\Models\Company;
use App\Models\Lodging;
use App\Models\User;
use Illuminate\Http\Request;

class CleaningRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $roles = config('constants.roles');
        $permissions = config('constants.permissions');
        $permissions[$user->user_type] = true;
        $cleaningRequests = null;

        if($permissions[$roles[2]]) {
            $company = Company::where("user_id", $user->id_user)->get()[0];
            $requests = CleaningRequest::where("company_id", $company->id_company)->where("state", 0)->get();
            $cleaningRequests = [];
            foreach ($requests as $request) {
                $accommodation = Lodging::where("id_lodging", $request->lodging_id)->get()[0];
                $cleaningRequests[] = [
                    "client" => User::where("id_user", $request->user_id)->get()[0]->name,
                    "accommodation" => $accommodation->name,
                    "address" => $accommodation->address,
                    "description" => $request->descricao,
                    "date" => $request->data_request,
                ];
            }
        }

        return view("cleaningRequests.index",
            [
                "cleaningRequests" => $cleaningRequests
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
