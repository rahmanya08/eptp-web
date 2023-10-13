<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study = StudyProgram::all();
        $studyPrograms = StudyProgram::select('name_study')->get();
        return view('dashboard.admin.study', compact('studyPrograms','study'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study = Major::select('majors.major','study_programs.name_study')
        ->join('study_programs','majors.study_program_id','=','study_programs.id')
        ->get();
        $studyPrograms = StudyProgram::select('id','name_study')->get();
        return view('dashboard.admin.major', compact('studyPrograms','study'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudyProgramRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name_study' => 'required',
           ]);  

        StudyProgram::create($validatedData);
        return redirect('/menu-major')->with('success', 'Data Program Studi berhasil disimpan.');
    }

    public function storeMajor(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'program_studi_id' => 'required',
            'major' => 'required',

           ]);  

        Major::create($validatedData);
        return redirect('/menu-major')->with('success', 'Data Major Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function showStudy()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudyProgramRequest  $request
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyProgram $studyProgram)
    {
        //
    }
}
