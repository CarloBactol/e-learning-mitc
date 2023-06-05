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
        $subject = Subject::all();
        return view('admin.subject.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
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
            'subject_code' => 'required|string|max:20|unique:subjects,subject_code',
            'subject_name' => 'required|string|max:20|unique:subjects,subject_name',
            'number_of_units' => 'required|string|max:20',
            'semester' => 'required|string|max:20',
            'description' => 'required|string|between:30,600',
        ]);

        $save_Sub = new Subject();
        $save_Sub->subject_code = $request->input('subject_code');
        $save_Sub->subject_name = $request->input('subject_name');
        $save_Sub->number_of_units = $request->input('number_of_units');
        $save_Sub->semester = $request->input('semester');
        $save_Sub->description = $request->input('description');
        $save_Sub->status = $request->input('status') == "" ? 0 : 1;
        $save_Sub->save();
        $request->session()->flash('status', 'New added!');
        return redirect('/admin/subjects');
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
        $subject = Subject::findorFail($id);
        return view('admin.subject.edit', compact('subject'));
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
            'subject_code' => 'required|string|max:20|unique:subjects,subject_code,' . $id,
            'subject_name' => 'required|string|max:20|unique:subjects,subject_name,' . $id,
            'number_of_units' => 'required|string|max:20',
            'semester' => 'required|string|max:20',
            'description' => 'required|string|between:30,600,' . $id,
        ]);

        $update_Subject = Subject::findorFail($id);
        $update_Subject->subject_code = $request->input('subject_code');
        $update_Subject->subject_name = $request->input('subject_name');
        $update_Subject->number_of_units = $request->input('number_of_units');
        $update_Subject->semester = $request->input('semester');
        $update_Subject->description = $request->input('description');
        $update_Subject->status = $request->input('status') == "" ? 0 : 1;
        $update_Subject->save();
        $request->session()->flash('status', 'Updated Successfully!');
        return redirect('/admin/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('/admin/subjects')->with('status', 'Successfully deleted!');
    }
}
