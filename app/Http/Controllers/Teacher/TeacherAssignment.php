<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Section;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use App\Http\Controllers\Controller;

class TeacherAssignment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignment = Assignment::all();
        return view('teacher.assignment.index', compact('assignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = CourseSection::all();
        $section = Section::all();
        return view('teacher.assignment.create', compact('class', 'section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'assignment_name' => 'required',
            'course' => 'required',
            'section' => 'required',
        ]);

        $save = new Assignment;
        $save->assignment_name = $request->assignment_name;
        $save->course = $request->course;
        $save->section = $request->section;
        $save->save();

        return redirect()->route('teacher.teacher_assignments.index')->with([
            'status' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = CourseSection::all();
        $section = Section::all();
        $assignment = Assignment::find($id);
        return view('teacher.assignment.edit', compact('class', 'assignment', 'section'));
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
        $this->validate($request, [
            'assignment_name' => 'required',
            'course' => 'required',
            'section' => 'required',
        ]);

        $save =  Assignment::find($id);
        $save->assignment_name = $request->assignment_name;
        $save->course = $request->course;
        $save->section = $request->section;
        $save->save();

        return redirect()->route('teacher.teacher_assignments.index')->with([
            'status' => 'successfully updated !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment =  Assignment::find($id);
        $assignment->delete();
        return back()->with([
            'status' => 'successfully deleted!',
            'alert-type' => 'danger'
        ]);
    }
}
