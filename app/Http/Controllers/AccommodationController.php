<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodging;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $lodging = Lodging::where('user_id', $user->id_user)->get();

        return view("accommodations.index", ['lodging' => $lodging]);
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
}
