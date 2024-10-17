<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

class SpecificDepartmentController extends Controller
{

    public function SCFCDMNT($university_id, $faculty_id)
    {
        $dept = Department::where('university_id', $university_id)
            ->where('faculty_id', $faculty_id)
            ->get();

        return view('backend.department.specificDepartment', compact('dept', 'university_id', 'faculty_id'));
    }


    public function addSpecificDepartment($university_id, $id)
    {
        // dd($university_id, $id);
        $faculty = Faculty::where('university_id', $university_id)
            ->where('id', $id)
            ->first();
        // dd($faculty);

        return view('backend.department.addSpecificDepartment', compact('faculty', 'university_id', 'id'));
    }

    public function saveDepartment(Request $request, $university_id, $id)
    {
        $request->validate([
            'name' => 'required',
            'department_location' => 'required',
            'manager' => 'required'
        ]);

        $department = new Department();
        $department->name = $request->input('name');
        $department->department_location = $request->input('department_location');
        $department->manager = $request->input('manager');
        $department->university_id = $university_id; // Using the parameter passed to the function
        $department->faculty_id = $id; // Using the parameter passed to the function
        $department->save();

        return redirect()->route(
            'SCFCDMNT',
            [
                'university_id' => $department->university_id,
                'faculty_id' => $department->faculty_id,

            ],
            // compact('department')
        );
    }


    public function editSpecificDepartment($university_id, $faculty_id, $id)
    {
        $department = Department::where('university_id', $university_id)
            ->where('faculty_id', $faculty_id)
            ->where('id', $id)
            ->first();
        return view('backend.department.editSpecificDepartment')
            ->with('department', $department);
    }


    public function updateSpecificDepartment(Request $request, $university_id, $faculty_id, $id)
    {
        $request->validate([
            'name' => 'required',
            'department_location' => 'required',
            'manager' => 'required',
            'university_id' => 'required',
            'faculty_id' => 'required'
            // Add other validation rules as needed
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'name' => $request->name,
            'department_location' => $request->department_location,
            'manager' => $request->manager,
            'university_id' => $request->university_id,
            'faculty_id' => $request->faculty_id
            // Add other fields here as needed
        ]);

        return redirect()->route(
            'SCFCDMNT',
            [
                'university_id' => $university_id,
                'faculty_id' => $faculty_id,
                'id' => $id
            ]
        );
    }

    public function deleteSpecificDepartment($university_id, $faculty_id)
    {
        $department = Department::where('university_id', $university_id)
            ->where('faculty_id', $faculty_id)
            ->first();
        $department->delete();
        return redirect()->back();
    }

    public function viewDepartment()
    {
        $showDepartment = Department::all();
        return view(
            'backend.department.viewDepartment',
            compact('showDepartment')
        );
    }


    public function viewOneDepartment($university_id, $faculty_id, $id)
    {
        $showOneDepartment = Department::where('university_id', $university_id)
            ->where('faculty_id', $faculty_id)
            ->where('id', $id)
            ->get();

        // dd($showOneDepartment, Department::toSql());
        return view(
            'backend.department.viewOneDepartment',
            [
                'university_id' => $university_id,
                'faculty_id' => $faculty_id,
                'id' => $id
            ],
            compact('showOneDepartment')
        );
    }

    public function backToSpecificDepartment($university_id, $faculty_id)
    {
        $oneDept = Department::where('university_id', $university_id)
            ->where('faculty_id', $faculty_id)
            ->first();

        // Pass $oneDept to the view
        return view('backend.department.specificDepartment', compact('oneDept'));
    }

    public function allDepartments()
    {
        $departments = Department::all();
        return view('backend.department.allDepartments')
            ->with('departments', $departments);
    }
}
