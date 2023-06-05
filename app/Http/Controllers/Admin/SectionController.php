<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.section.create');
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
            'section' => 'required|string|max:20|unique:sections,section',
        ]);

        $save_Course = new Section();
        $save_Course->section = $request->input('section');
        $save_Course->status = $request->input('status') == "" ? 0 : 1;
        $save_Course->save();
        $request->session()->flash('status', 'New added!');
        return redirect()->route('admin.sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sections = Section::findorFail($id);
        return view('admin.section.edit', compact('sections'));
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
            'section' => 'required|string|max:20|unique:sections,section,' . $id,
        ]);

        $update_Course = Section::findOrFail($id);
        $update_Course->section = $request->input('section');
        $update_Course->status = $request->input('status') == "" ? 0 : 1;
        $update_Course->save();
        $request->session()->flash('status', 'Updated Successfully!');
        return redirect()->route('admin.sections.index')->with('status', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del_sec = Section::find($id);
        $del_sec->delete();
        return redirect()->route('admin.sections.index')->with('status', 'Successfully deleted!');
    }
}
