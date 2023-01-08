<?php

namespace App\Http\Controllers;
use App\Models\Branch_faculty;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    //
    public function index()
    {
        $buildings = Building::with('branch_faculty', 'branch_faculty.branch', 'branch_faculty.faculty')->get();
        $branch_faculties = Branch_faculty::with('faculty', 'branch')->get();

        // ambil semua data pada building terhadap faculty dan branch
        // $buildings = Building::with('branch_faculty.branch', 'branch_faculty.faculty')->get();

        // return response()->json([
        //     'buildings' => $buildings,
        //     'branch_faculties' => $branch_faculties
        // ]);

        return view('pages.detail-building', compact('buildings','branch_faculties'), ['type_menu' => 'details']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'codeBuilding' => 'required',
            'branf_id' => 'required',
        ]);

        $building = new Building();
        $building->name = $request->name;
        $building->codeBuilding = $request->codeBuilding;
        $building->branf_id = $request->branf_id;

        $building->save();
        return redirect('/detail-building')->with('success', 'Building saved!');
    }

    public function edit($id)
    {
        $building = Building::find($id);
        return view('pages.form-edit-building', compact('building'), ['type_menu' => 'forms']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'codeBuilding' => 'required',
            'branf_id' => 'required',
        ]);

        $building = Building::find($id);
        $building->name = $request->name;
        $building->codeBuilding = $request->codeBuilding;
        $building->branf_id = $request->branf_id;

        $building->save();
        return redirect('/detail-building')->with('success', 'Building updated!');
    }

    public function delete($id)
    {
        $building = Building::find($id);
        $building->delete();
        return redirect('/detail-building')->with('success', 'Building deleted!');
    }
}
