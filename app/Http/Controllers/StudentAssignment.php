<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assignment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StudentAssignment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = StudentAnswer::where('user_id', '=', Auth::user()->id)->pluck('assignment_id')->toArray();
        $assignment = Assignment::where('course', Auth::user()->course)
            ->where('section', Auth::user()->section)
            ->get();
        return view('student.assignment.index', compact('assignment', 'result'));
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
        // Validate the input

        $this->validate($request, [
            'answer' => 'required',
        ]);

        StudentAnswer::create([
            'assignment_id' => $request->assignment_id,
            'assignment_name' => $request->assignment_name,
            'class' => $request->class,
            'user_id' => Auth::user()->id,
            'student' => Str::ucfirst(Auth::user()->firstname) . ' ' . str::ucfirst(Auth::user()->lastname),
            'answer' => $request->answer,
        ]);

        return redirect()->route('student_assignments.index')->with('status', 'Submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);
        return view('student.assignment.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
