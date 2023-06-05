<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = CourseSection::all();
        return view('admin.class.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
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
            'course' => 'required|string|max:20|unique:course_sections,course',
        ]);

        $save_Course = new CourseSection();
        $save_Course->course = $request->input('course');
        $save_Course->status = $request->input('status') == "" ? 0 : 1;
        $save_Course->save();
        $request->session()->flash('status', 'New added!');
        return redirect()->route('admin.courses.index');
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
        $course = CourseSection::findorFail($id);
        return view('admin.class.edit', compact('course'));
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
            'course' => 'required|string|max:20|unique:course_sections,course,' . $id,
        ]);

        $update_Course = CourseSection::findOrFail($id);
        $update_Course->course = $request->input('course');
        $update_Course->status = $request->input('status') == "" ? 0 : 1;
        $update_Course->save();
        $request->session()->flash('status', 'Updated Successfully!');
        return redirect()->route('admin.courses.index')->with('status', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_Course = CourseSection::find($id);
        $del_Course->delete();
        return redirect()->route('admin.courses.index')->with('status', 'Successfully deleted!');
    }
}
