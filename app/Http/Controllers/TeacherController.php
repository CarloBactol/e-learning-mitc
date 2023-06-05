<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = User::where('role_as', '2')->get();
        return view('admin.teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::where('status', '1')->get();
        return view('admin.teacher.create', compact('department'));
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
            'firstname' => 'required|string|min:2|max:20|unique:users,firstname',
            'lastname' => 'required|string|min:2|max:20|unique:users,lastname',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $save_Dep = new User();
        $save_Dep->name = $request->input('firstname') . ' ' . $request->input('lastname');
        $save_Dep->firstname = $request->input('firstname');
        $save_Dep->lastname = $request->input('lastname');
        $save_Dep->email = $request->input('email');
        $save_Dep->password = Hash::make($request->input('password'));
        $save_Dep->status = $request->input('status') == "" ? 0 : 1;
        $save_Dep->role_as = 2;
        $save_Dep->save();
        $request->session()->flash('status', 'New added!');
        return redirect('/admin/teachers');
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
        $teacher = User::findorFail($id);
        $dep = Department::where('status', '1')->get();
        return view('admin.teacher.edit', compact('teacher', 'dep'));
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
            'firstname' => 'required|string|min:2|max:20',
            'lastname' => 'required|string|min:2|max:20',
            'email' => 'required|string|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
        ]);

        $chkpass = User::findorFail($id);
        if (password_verify($request->password, $chkpass->password)) {
            $request->session()->flash('messageErr', 'old password verified!');
            $update_User =  User::findorFail($id);
            $update_User->name = $request->input('firstname') . ' ' . $request->input('lastname');
            $update_User->firstname = $request->input('firstname');
            $update_User->lastname = $request->input('lastname');
            $update_User->email = $request->input('email');
            $update_User->password = $chkpass->password;
            $update_User->status = $request->input('status') == "" ? 0 : 1;
            $update_User->role_as = " 2";
            $update_User->save();
            return redirect('/admin/teachers')->with('status', 'Record Successfully Updated!');
        } else {
            $request->session()->flash('messageErr', 'The default password has already changed the owner!');
            $update_User =  User::findorFail($id);
            $update_User->name = $request->input('firstname') . ' ' . $request->input('lastname');
            $update_User->firstname = $request->input('firstname');
            $update_User->lastname = $request->input('lastname');
            $update_User->email = $request->input('email');
            $update_User->password = $chkpass->password;
            $update_User->status = $request->input('status') == "" ? 0 : 1;
            $update_User->role_as = "2";
            $update_User->save();
            return redirect('/admin/teachers')->with('status', 'Record Successfully Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = User::find($id);
        $department->delete();
        return redirect('/admin/teachers')->with('status', 'Successfully deleted!');
    }
}
