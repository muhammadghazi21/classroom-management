<?php

namespace App\Http\Controllers;

use App\Models\Branch_faculty;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FacultyController extends Controller
{
    public function index(Request $request)
    {
        $faculties = Faculty::with('branches')->where('name', 'like', "%$request->search%")->get();
        $branch_faculty = Branch_faculty::with('faculty', 'branch')->get();

        return view('pages.detail-faculty', compact('branch_faculty', 'faculties'), ['type_menu' => 'details']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $faculties = new Faculty;
        $faculties->name = $request->name;

        $faculties->save();
        return redirect('/detail-faculty')->with('status', 'Data Berhasil Ditambahkan');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $faculties = Faculty::find($id);
        $faculties->name = $request->name;
        error_log($faculties);

        $faculties->save();
        return redirect('/detail-faculty')->with('status', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $faculties = Faculty::find($id);
        $faculties->delete();
        return redirect('/detail-faculty')->with('status', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $faculties = Faculty::find($id);
        return view('pages.form-edit-faculty', compact('faculties'), ['type_menu' => 'forms']);
    }
}
