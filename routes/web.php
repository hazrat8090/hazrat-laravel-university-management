<?php

use App\Http\Controllers\allFacultiesController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\EditFacultyCntroller;
use App\Http\Controllers\EditUniversityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecificDepartmentController;
use App\Http\Controllers\SpecificFacultyController;
use App\Http\Controllers\UniversityManagersController;
use App\Http\Middleware\CheckRoleUniversityMiddleware;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [BackendController::class, 'showBackend'])->name('dashboard');


Route::group(['middleware' => ['role:super-admin|kabul-university-officer|herat-university-officer|mazar-university-officer']], function () {

    Route::get('university', [EditUniversityController::class, 'showUniversity'])->name('showUniversity');
    Route::get('addUniversity', [EditUniversityController::class, 'addUniversity'])->name('addUniversity')
        ->middleware('role:super-admin');
    Route::post('saveUniversity', [EditUniversityController::class, 'saveUniversity'])->name('saveUniversity');
    Route::get('editUniversity/{id}', [EditUniversityController::class, 'editUniversity'])->name('editUniversity');
    Route::put('updateUniversity/{id}', [EditUniversityController::class, 'updateUniversity'])->name('updateUniversity');
    Route::delete('deleteUniversity/{id}', [EditUniversityController::class, 'deleteUniversity'])->name('deleteUniversity');

    // Route::resource('faculty', FacultyController::class);
    Route::get('university/allFaculties', [allFacultiesController::class, 'allFaculties'])->name('allFaculties');
    Route::get('allUniversities', [EditFacultyCntroller::class, 'allUniversities'])->name('allUniversities');
    Route::get('/university/{id}/faculty', [EditFacultyCntroller::class, 'showFaculty'])->name('showFaculty');
    Route::get('/university{id}/faculty', [EditFacultyCntroller::class, 'addFaculty'])->name('addFaculty');
    Route::post('/university/{university_id}/faculty/saveFaculty', [EditFacultyCntroller::class, 'saveFaculty'])->name('saveFaculty');
    Route::delete('/university/{university_id}/faculty/{id}/deletefaculty', [EditFacultyCntroller::class, 'deleteFaculty'])->name('deleteFaculty');
    Route::get('/university/{university_id}/showSpecificFaculty', [EditFacultyCntroller::class, 'showSpecificFaculty'])->name('showSpecificFaculty');
    // related to specific faculty 
    Route::get('/university/{university_id}/faculty/{id}/editSpecificFaculty', [SpecificFacultyController::class, 'editSpecificFaculty'])->name('editSpecificFaculty');
    Route::delete('/university/{university_id}/faculty/{id}/deleteSpecificFaculty', [SpecificFacultyController::class, 'deleteSpecificFaculty'])->name('deleteSpecificFaculty');
    Route::put('/university/{university_id}/faculty/{id}/updateSpecificFaculty', [SpecificFacultyController::class, 'updateSpecificFaculty'])->name('updateSpecificFaculty');
    Route::delete('/faculty/{id}/delepteFromAllFaculties', [SpecificFacultyController::class, 'delepteFromAllFaculties'])->name('delepteFromAllFaculties');
    // Related to the Specific Department
    Route::get('/university/{university_id}/faculty/{id}/addDepartment', [SpecificDepartmentController::class, 'addSpecificDepartment'])->name('addSpecificDepartment');
    Route::post('/university/{university_id}/faculty/{id}/saveDepartment', [SpecificDepartmentController::class,  'saveDepartment'])->name('saveDepartment');
    Route::delete('/university/{university_id}/faculty/{faculty_id}/deleteSpecificDepartment', [SpecificDepartmentController::class, 'deleteSpecificDepartment'])->name('deleteSpecificDepartment');
    Route::get('/university/{university_id}/faculty/{faculty_id}/department/{id}/editSpecificDepartment', [SpecificDepartmentController::class, 'editSpecificDepartment'])->name('editSpecificDepartment');
    Route::put('/university/{university_id}/faculty/{faculty_id}/department/{id}/updateSpecificDepartment', [SpecificDepartmentController::class, 'updateSpecificDepartment'])->name('updateSpecificDepartment');
    // Route::get('/university/{university_id}/faculty/{id}/department', [SpecificDepartmentController::class, 'specificDepartment'])->name('specificDepartment');
    Route::get('/viewDepartment', [SpecificDepartmentController::class, 'viewDepartment'])->name('viewDepartment');
    Route::get('/university/{university_id}/faculty/{faculty_id}/department/{id}/viewOneDepartment', [SpecificDepartmentController::class, 'viewOneDepartment'])->name('viewOneDepartment');
    Route::get('/university/{university_id}/faculty/{faculty_id}/department/SCFCDMNT', [SpecificDepartmentController::class, 'SCFCDMNT'])->name('SCFCDMNT');
    Route::get('/university/{university_id}/faculty/{faculty_id}/department/backToSpecificDepartment', [SpecificDepartmentController::class, 'backToSpecificDepartment'])->name('backToSpecificDepartment');
    Route::get('/university/departments', [SpecificDepartmentController::class, 'allDepartments'])->name('allDepartments');

    // related to the permissions
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    // related to the roles
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/giv-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/giv-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    // related to the user
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::delete('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);


    // reistration
    Route::get('registration', [App\Http\Controllers\AuthController::class, 'registration'])->name('registration');

    // Herat University in the side bar for role and permission
    Route::get('/heratUniversty', [UniversityManagersController::class, 'Huniversity'])->name('Huniversity');
    Route::get('/facultyOfHeratUniversity/{id}', [UniversityManagersController::class, 'facultyOfHeratUniversity'])->name('facultyOfHeratUniversity');
    Route::get('/HuniversityCSdepartments/{university_id}/faculty/{id}', [UniversityManagersController::class, 'HuniversityCSdepartments'])->name('HuniversityCSdepartments');

    // Kabul University in the side bar for role and permission
    Route::get('/kabulUniversty', [UniversityManagersController::class, 'Kuniversity'])->name('Kuniversity');
    Route::get('/facultyOfKabulUniversity/{id}', [UniversityManagersController::class, 'facultyOfKabulUniversity'])->name('facultyOfKabulUniversity');
    Route::get('/KuniversityECdepartments/{university_id}/faculty/{id}', [UniversityManagersController::class, 'KuniversityECdepartments'])->name('KuniversityECdepartments');

    // Mazar University in the side bar for role and permission
    Route::get('/mazarUniversty', [UniversityManagersController::class, 'Muniversity'])->name('Muniversity');
    Route::get('/facultyOfMazarUniversity/{id}', [UniversityManagersController::class, 'facultyOfMazarUniversity'])->name('facultyOfMazarUniversity');
    Route::get('/MuniversityCEdepartments/{university_id}/faculty/{id}', [UniversityManagersController::class, 'MuniversityCEdepartments'])->name('MuniversityCEdepartments');
});


Route::get('/locale/{locale}', function ($locale) {
    app()->setlocale($locale);
    Session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
