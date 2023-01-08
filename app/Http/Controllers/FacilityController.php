<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    //
    public function index()
    {
        $facilities = Facility::all();
        return view('pages.detail-facility', compact("facilities"), ['type_menu' => 'details']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $facility = new Facility();
        $facility->name = $request->name;

        $facility->save();
        return redirect('/detail-facility')->with('success', 'Facility saved!');
    }
    public function delete($id)
    {
        $facility = Facility::find($id);
        $facility->delete();
        return redirect('/detail-facility')->with('success', 'Facility deleted!');
    }
}
