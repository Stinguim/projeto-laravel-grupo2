<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodging;
use App\Models\Company;
use App\Models\CleaningRequest;

class AccommodationController extends Controller
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
        $lodging = null;
        if($permissions[$roles[0]]) {
            $lodging = Lodging::all();
        } else {
            $lodging = Lodging::where('user_id', $user->id_user)->get();
        }

        return view("accommodations.index",
            [
                'lodging' => $lodging
            ]
        );
    }

    public function create()
    {
        return view("accommodations.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $lodging = new Lodging();

        $lodging->name = $request->input('name');
        $lodging->description = $request->input('description');
        $lodging->address = $request->input('address');
        $lodging->user_id = $user->id_user;
        $lodging->save();
        return redirect('/accommodations');
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

    public function approve(string $id)
    {
        $user = auth()->user();
        if($user->user_type == 'admin') {
            $lodge = Lodging::find($id);
            if($lodge) {
                $lodge->validated = 1;
                $lodge->save();
            }
        }
        return redirect('/accommodations');
    }

    public function scheduleCleanupForm(string $id)
    {
        $lodge = Lodging::find($id);
        if($lodge) {
            $companies = Company::all();
            return view('accommodations.schedule_cleaning', ['lodge' => $lodge, 'companies' => $companies]);
        } else {
            return redirect('/accommodations');
        }
    }

    public function scheduleCleanup(Request $request)
    {
        $user = auth()->user();
        $cleaningRequest = new CleaningRequest();
        $cleaningRequest->data_request = $request->input('date');
        $cleaningRequest->descricao = $request->input('description');
        $cleaningRequest->lodging_id = $request->input('lodging_id');
        $cleaningRequest->user_id = $user->id_user;
        $cleaningRequest->company_id = $request->input('company_id');
        $cleaningRequest->save();
        return redirect('/accommodations');
    }

    public function accommodation(string $id)
    {
        $lodge = Lodging::find($id);
        if($lodge) {
            $cleaning = CleaningRequest::where('lodging_id', $id)->get();
            foreach($cleaning as $c) {
                $c->company = Company::find($c->company_id)->first()->name;
            }
            return view('accommodations.accommodation', ['lodge' => $lodge, 'cleaning' => $cleaning]);
        }
        return redirect('/accommodations');
    }
}
