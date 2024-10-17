<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\University;
use Egulias\EmailValidator\Result\Reason\UnclosedComment;
use Illuminate\Http\Request;

class UniversityManagersController extends Controller
{
    public function Huniversity()
    {

        $herat = University::where('name', 'Herat University')->first();
        return view('backend.universities.heratUniversity', ['herat' => $herat]);
    }

    public function facultyOfHeratUniversity($id)
    {
        $facultyOfHerat = Faculty::where('university_id', $id)->get();
        return view('backend.faculties.heratFaculties', ['facultyOfHerat' => $facultyOfHerat]);
    }

    public function HuniversityCSdepartments($university_id, $id)
    {
        $CSfaculty = Department::where('university_id', $university_id)
            ->where('faculty_id', $id)
            ->get();
        return view('backend.departments.heratComputerScienceDepartment', ['CSfaculty' => $CSfaculty]);
    }


    public function Kuniversity()
    {
        $kabul = University::where('name', 'Kabul University')->first();
        return view('backend.universities.kabulUniversity', ['kabul' => $kabul]);
    }

    public function facultyOfKabulUniversity($id)
    {
        $facultyOfKabul = Faculty::where('university_id', $id)->get();
        return view('backend.faculties.kabulFaculties', ['facultyOfKabul' => $facultyOfKabul]);
    }

    public function KuniversityECdepartments($university_id, $id)
    {
        $ECfaculty = Department::where('university_id', $university_id)
            ->where('faculty_id', $id)
            ->get();
        return view('backend.departments.kabulEconomicDepartments', ['ECfaculty' => $ECfaculty]);
    }

    public function Muniversity()
    {
        $mazar = University::where('name', 'Mazar University')->first();
        return view('backend.universities.mazarUniversity', ['mazar' => $mazar]);
    }

    public function facultyOfMazarUniversity($id)
    {
        $facultyOfMazar = Faculty::where('university_id', $id)->get();
        return view('backend.faculties.mazarFaculties', ['facultyOfMazar' => $facultyOfMazar]);
    }

    public function MuniversityCEdepartments($university_id, $id)
    {
        $CEfaculty = Department::where('university_id', $university_id)
            ->where('faculty_id', $id)
            ->get();
        return view('backend.departments.mazarCivilEngineeringDepartments', ['CEfaculty' => $CEfaculty]);
    }
}
