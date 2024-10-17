<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class allFacultiesController extends Controller
{
    public function allFaculties()
    {
        $faculties = Faculty::all();
        return view('backend.faculty.allFaculties')
            ->with('faculties', $faculties);
    }
}
