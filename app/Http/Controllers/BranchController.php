<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Branch_faculty;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branches = Branch::with('faculties')->where('name', 'like', "%$request->search%")->get();
        $branch_faculty = Branch_faculty::with('faculty', 'branch')->get();

        return view('pages.detail-branch', compact('branch_faculty','branches'), ['type_menu' => 'details']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        $branches = new Branch;
        $branches->name = $request->name;
        $branches->address = $request->address;
        $branches->city = $request->city;
        $branches->postcode = $request->postcode;

        $branches->save();
        return redirect('/detail-branch')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::find($id);
        return view('pages.form-edit-branch', compact('branches'), ['type_menu' => 'forms']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        $branches = Branch::find($id);
        $branches->name = $request->name;
        $branches->address = $request->address;
        $branches->city = $request->city;
        $branches->postcode = $request->postcode;

        $branches->save();
        return redirect('/detail-branch')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $branches = Branch::find($id);
        $branches->delete();
        return redirect('/detail-branch')->with('status', 'Data Berhasil Dihapus');
    }
}
