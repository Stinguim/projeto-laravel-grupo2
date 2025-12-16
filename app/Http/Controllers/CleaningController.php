<?php

namespace App\Http\Controllers;

use App\Models\Cleaning;
use Illuminate\Http\Request;

class CleaningController extends Controller
{
    public function showSchedule(){
        $cleanings = Cleaning::all();
        return view("schedule", ['cleanings' => $cleanings]);
    }
}
