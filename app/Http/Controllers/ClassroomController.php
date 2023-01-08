<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Classroom;
use App\Models\Facility;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::with('building','facilities')->get();
        $buildings = Building::with('branch_faculty')->get();
        $facilities = Facility::all();
        return view('pages.detail-classroom', compact("classrooms", "buildings", "facilities"), ['type_menu' => 'details']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'building_id' => 'required',
        ]);

        $classroom = new Classroom();
        $classroom->name = $request->name;
        $classroom->capacity = $request->capacity;
        $classroom->building_id = $request->building_id;
        $classroom->save();
        $classroom->facilities()->attach($request->facilities);

        return redirect('/detail-classroom')->with('success', 'Classroom saved!');
    }

    public function edit($id)
    {
        $classroom = Classroom::find($id);
        $buildings = Building::with('branch_faculty')->get();
        return view('pages.form-edit-classroom', compact('classroom', 'buildings'), ['type_menu' => 'forms']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'building_id' => 'required',
        ]);

        $classroom = Classroom::find($id);
        $classroom->name = $request->name;
        $classroom->capacity = $request->capacity;
        $classroom->building_id = $request->building_id;

        $classroom->save();
        return redirect('/detail-classroom')->with('success', 'Classroom updated!');
    }

    public function delete($id)
    {
        $classroom = Classroom::find($id);
        $classroom->delete();
        return redirect('/detail-classroom')->with('success', 'Classroom deleted!');
    }
}
