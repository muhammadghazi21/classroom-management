<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::with('faculty')->get();
        $faculty = Faculty::get();
        return view('pages.detail-department', compact('departments','faculty'), ['type_menu' => 'details']);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'codeDepartment' => 'required',
            'faculty_id' => 'required',
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->faculty_id = $request->faculty_id;
        $department->codeDepartment = $request->codeDepartment;
        $department->save();

        return redirect('/detail-department')->with('success', 'Department saved!');
    }

    public function edit($id){
        $department = Department::find($id);
        $faculties = Faculty::get();
        return view('pages.form-edit-department', compact('department', 'faculties'), ['type_menu' => 'forms']);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'faculty_id' => 'required',
            'codeDepartment' => 'required',
        ]);

        $department = Department::find($id);
        $department->name = $request->name;
        $department->faculty_id = $request->faculty_id;
        $department->codeDepartment = $request->codeDepartment;

        $department->save();
        return redirect('/detail-department')->with('success', 'Department updated!');
    }

    public function delete($id){
        $department = Department::find($id);
        $department->delete();

        return redirect('/detail-department')->with('success', 'Department deleted!');
    }
}
