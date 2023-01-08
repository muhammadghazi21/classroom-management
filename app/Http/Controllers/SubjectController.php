<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('pages.detail-subject', compact("subjects"), ['type_menu' => 'details']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'term' => 'required',
        ]);

        $subject = new Subject;
        $subject->name = $request->name;
        $subject->term = $request->term;

        $subject->save();
        return redirect('/detail-subject')->with('success', 'Subject saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('pages.form-edit-subject', compact('subject'), ['type_menu' => 'forms']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'term' => 'required',
        ]);

        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->term = $request->term;

        $subject->save();
        return redirect('/detail-subject')->with('success', 'Subject updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('/detail-subject')->with('success', 'Subject deleted!');
    }
}
