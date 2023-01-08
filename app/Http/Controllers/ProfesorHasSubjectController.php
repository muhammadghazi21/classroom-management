<?php

namespace App\Http\Controllers;

use App\Models\Profesor_has_subject;
use App\Models\Subject;
use Illuminate\Http\Request;

class ProfesorHasSubjectController extends Controller
{
    //
    public function index()
    {
        $profesor_has_subjects = Profesor_has_subject::with('profesor', 'subject')->get();
        $subjects = Subject::all();
        return view('pages.detail-class', compact('subjects', 'profesor_has_subjects'), ['type_menu' => 'dashboard']);
    }
}
