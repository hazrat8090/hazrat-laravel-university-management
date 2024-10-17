<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class EditUniversityController extends Controller
{


    public function __construct()
    {
        // $this->middleware('permission: All Previlage', ['only' => ['addUniversity']]);
    }


    public function showUniversity()
    {
        // $universities = University::all();
        return view('backend.university.allUniversities')
            ->with('universities', University::all());
    }

    public function addUniversity()
    {
        return view('backend.university.addUniversity');
    }

    public function saveUniversity(Request $request)
    {
        $request->validate([
            'name' => "required",
            'branch' => 'required',
            'type' => 'required',
            'no_faculty' => 'required'
        ]);

        $universities = new University();
        $universities->name = $request->input('name');
        $universities->branch = $request->input('branch');
        $universities->type = $request->input('type');
        $universities->no_faculty = $request->input('no_faculty');
        $universities->save();

        return redirect()->route('showUniversity');
    }

    public function editUniversity(Request $request, $id)
    {
        $university = University::findOrFail($id);
        return view('backend.university.editUniversity', compact('university'));
    }

    public function updateUniversity(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'branch' => 'required',
            'type' => 'required',
            'no_faculty' => 'required',
        ]);
        $university = University::find($id);
        $university->name = $request->name;
        $university->branch = $request->branch;
        $university->type = $request->type;
        $university->no_faculty = $request->no_faculty;
        $university->save();
        return redirect()->route('showUniversity');
    }

    public function deleteUniversity($id)
    {
        $university = University::find($id);
        $university->delete();
        return redirect()->route('showUniversity')
            ->with('success', 'your record has been deleted successfully!');
    }
}
