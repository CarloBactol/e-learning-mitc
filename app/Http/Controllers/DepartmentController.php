<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        return view('admin.department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.department.create');
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
            'department_name' => 'required|string|max:20|unique:departments,department_name',
            'person_incharge' => 'required|string|max:20|unique:departments,person_incharge',
        ]);

        $save_Dep = new Department();
        $save_Dep->department_name = $request->input('department_name');
        $save_Dep->person_incharge = $request->input('person_incharge');
        $save_Dep->status = $request->input('status') == "" ? 0 : 1;
        $save_Dep->save();
        $request->session()->flash('status', 'New added!');
        return redirect('/admin/departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $department = Department::findorFail($id);
        // return view('admin.department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findorFail($id);
        return view('admin.department.edit', compact('department'));
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
            'department_name' => 'required|string|max:20|unique:departments,department_name,' . $id,
            'person_incharge' => 'required|string|max:20|unique:departments,person_incharge,' . $id,
        ]);

        $update_Dep = Department::find($id);
        $update_Dep->department_name = $request->input('department_name');
        $update_Dep->person_incharge = $request->input('person_incharge');
        $update_Dep->status = $request->input('status') == "" ? 0 : 1;
        $update_Dep->save();
        $request->session()->flash('status', 'Successfully update!');
        return redirect('/admin/departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect('/admin/departments')->with('status', 'Successfully deleted!');
    }
}
