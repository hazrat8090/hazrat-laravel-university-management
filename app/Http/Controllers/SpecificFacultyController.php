<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class SpecificFacultyController extends Controller
{
    // Edit Specific Faculty
    public function editSpecificFaculty($university_id, $id)
    {
        $editSpecificFaculty = Faculty::where('university_id', $university_id)
            ->where('id', $id)
            ->first();
        return view('backend.faculty.editSpecificFaculty')
            ->with('faculty', $editSpecificFaculty);
    }


    public function updateSpecificFaculty(Request $request, $university_id, $id)
    {
        $request->validate([
            'name' => 'required',
            'no_teachers' => 'required',
            'university_id' => 'required'
        ]);
        $faculty = Faculty::where('university_id', $university_id)
            ->where('id', $id)
            ->first();

        if (!$faculty) {
            // Handle the case where faculty is not found
            return redirect()->back()->with('error', 'Faculty not found');
        }
        $faculty->name = $request->name;
        $faculty->no_teachers = $request->no_teachers;
        $faculty->university_id = $request->university_id;
        $faculty->save();

        return redirect()->route('showSpecificFaculty', ['university_id' => $faculty->university_id]);
    }


    public function deleteSpecificFaculty($university_id, $id)
    {
        $specificFaculty = Faculty::where('university_id', $university_id)
            ->where('id', $id)
            ->first();
        $specificFaculty->delete();
        return redirect()->back();
    }

    public function delepteFromAllFaculties($id)
    {
        $deleteFromFaculties = Faculty::find($id);
        $deleteFromFaculties->delete();
        return redirect()->back();
    }
}
