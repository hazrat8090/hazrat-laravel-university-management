<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\University;
use Illuminate\Http\Request;

class EditFacultyCntroller extends Controller
{

    public function allUniversities()
    {
        return view('backend.university.allUniversities');
    }

    public function showFaculty()
    {
        $faculties = Faculty::all();
        return view('backend.faculty.allFaculties')
            ->with('faculties', $faculties);
    }

    public function addFaculty($id)
    {
        $universities = University::findOrFail($id);
        return view('backend.faculty.addFaculty', compact('universities'));
    }

    public function saveFaculty(Request $request, $university_id)
    {
        $request->validate([
            'name' => 'required',
            'no_teachers' => 'required',
            'university_id' => 'required'
        ]);
        // $university = new University();
        $faculty = new Faculty();
        $faculty->name = $request->input('name');
        $faculty->no_teachers = $request->input('no_teachers');
        $faculty->university_id = $university_id;
        $faculty->save();
        return redirect()->route('showSpecificFaculty', ['university_id' => $faculty->university_id]);
    }

    public function editFaculty($id, $university_id)
    {
        // dd($id, $university_id);
        $faculty = Faculty::where('university_id', $university_id)
            ->where('id', $id)
            ->first();
        return view('backend.faculty.editFaculty', compact('faculty'));
    }

    public function updateFaculty(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'no_teachers' => 'required',
            'university_id' => 'required'
        ]);
        $faculty = Faculty::find($id);
        $faculty->name = $request->name;
        $faculty->no_teachers = $request->no_teachers;
        $faculty->university_id = $request->university_id;
        $faculty->save();
        return redirect()->route('showFaculty');
    }


    public function deleteFaculty($university_id, $id)
    {
        $faculty = Faculty::where('university_id', $university_id)
            ->where('id', $id)
            ->first();
        // $faculty = Faculty::find($id);
        $faculty->delete();

        return redirect()->route('showSpecificFaculty', ['university_id' => $university_id, 'id' => $id]);
    }

    public function showSpecificFaculty(Request $request, $university_id)
    {
        $universities = University::find($university_id);
        $faculties = Faculty::where('university_id', $university_id)
            ->get();
        return view('backend.faculty.specificFaculty', compact('universities', 'faculties'));
    }
}
