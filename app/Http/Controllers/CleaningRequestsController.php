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
            $requests = CleaningRequest::where("company_id", $company->id_company)->get();
            $requests = $requests->sortByDesc(function ($request) {
                return $request->state;
            })->values();
            $cleaningRequests = [];
            foreach ($requests as $request) {
                $accommodation = Lodging::where("id_lodging", $request->lodging_id)->get()[0];
                $cleaningRequests[] = [
                    "id" => $request->id_cleaning_request,
                    "client" => User::where("id_user", $request->user_id)->get()[0]->name,
                    "accommodation" => $accommodation->name,
                    "address" => $accommodation->address,
                    "description" => $request->descricao,
                    "date" => $request->data_request,
                    "state" => $request->state,
                ];
            }
        }

        return view("cleaningRequests.index",
            [
                "cleaningRequests" => $cleaningRequests
            ]
        );
    }
    public function accept($id)
    {
        $user = auth()->user();

        // Buscar pedido pedido de limpeza
        $request = CleaningRequest::where("id_cleaning_request", $id)->firstOrFail();

        // Só aceita se o pedido tiver o estado "pendente"
        if ($request->state !== CleaningRequest::STATE_PENDING) {
            abort(403);
        }

        // Atualizar estado para "aceite"
        $request->state = CleaningRequest::STATE_APPROVED;
        $request->save();

        return redirect()->back()->with("success", "Cleaning request accepted");
    }

    public function reject($id)
    {
        $user = auth()->user();

        // Buscar pedido de limpeza
        $request = CleaningRequest::where("id_cleaning_request", $id)->firstOrFail();

        // só recusa se o pedido tiver o estado "pendente"
        if ($request->state !== CleaningRequest::STATE_PENDING) {
            abort(403);
        }

        // atualizar estado para "recusado"
        $request->state = CleaningRequest::STATE_REJECTED;
        $request->save();

        return redirect()->back()->with("success", "Cleaning request rejected");
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
