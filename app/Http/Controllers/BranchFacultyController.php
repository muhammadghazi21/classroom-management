<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Branch_faculty;
use App\Models\Faculty;
use Illuminate\Http\Request;

class BranchFacultyController extends Controller
{
    //
    public function index()
    {
        $branches = Branch::with('faculties')->get();
        $faculties = Faculty::with('branches')->get();
        $branch_faculties = Branch_faculty::with('faculty', 'branch')->get();

        return view('pages.detail-branch-faculty', compact("branches", 'faculties', 'branch_faculties'), ['type_menu' => 'details']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required',
            'faculty_id' => 'required',
        ]);

        $branch_faculty = new Branch_faculty();
        $branch_faculty->branch_id = $request->branch_id;
        $branch_faculty->faculty_id = $request->faculty_id;

        $branch_faculty->save();
        return redirect('/detail-branch-faculty')->with('success', 'Branch Faculty saved!');
    }

    public function delete($id)
    {
        $branch_faculty = Branch_faculty::find($id);
        $branch_faculty->delete();

        return redirect('/detail-branch-faculty')->with('success', 'Branch Faculty deleted!');
    }

    public function edit($id)
    {
        $branch_faculty = Branch_faculty::with('faculty', 'branch')->find($id);
        $branches = Branch::with('faculties')->get();
        $faculties = Faculty::with('branches')->get();

        return view('pages.form-edit-branch-faculty', compact('branch_faculty', 'branches', 'faculties'), ['type_menu' => 'forms']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'branch_id' => 'required',
            'faculty_id' => 'required',
        ]);

        $branch_faculty = Branch_faculty::find($id);
        $branch_faculty->branch_id = $request->branch_id;
        $branch_faculty->faculty_id = $request->faculty_id;

        $branch_faculty->save();
        return redirect('/detail-branch-faculty')->with('success', 'Branch Faculty updated!');
    }
}
