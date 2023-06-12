<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = User::where('role_as', '0')->get();
        return view('admin.student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = CourseSection::where('status', '1')->get();
        $section = Section::where('status', '1')->get();
        return view('admin.student.create', compact('course', 'section'));
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
            'id_number' => 'required|string|min:8|max:10|unique:users,id_number',
            'firstname' => 'required|string|min:2|max:20|unique:users,firstname',
            'lastname' => 'required|string|min:2|max:20|unique:users,lastname',
            'course' => 'required',
            'section' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $save_Dep = new User();
        $save_Dep->id_number = $request->input('id_number');
        $save_Dep->name = $request->input('firstname') . ' ' . $request->input('lastname');
        $save_Dep->firstname = $request->input('firstname');
        $save_Dep->lastname = $request->input('lastname');
        $save_Dep->course = $request->input('course');
        $save_Dep->section = $request->input('section');
        $save_Dep->email = $request->input('email');
        $save_Dep->password = Hash::make($request->input('password'));
        $save_Dep->status = $request->input('status') == "" ? 0 : 1;
        $save_Dep->save();
        $request->session()->flash('status', 'New added!');
        return redirect('/admin/students');
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
        $student = User::findorFail($id);
        $course = CourseSection::where('status', '1')->get();
        $section = Section::where('status', '1')->get();
        return view('admin.student.edit', compact('course', 'student', 'section'));
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
            'id_number' => 'required|string|min:8|max:10|unique:users,id_number,' . $id,
            'firstname' => 'required|string|min:2|max:20',
            'lastname' => 'required|string|min:2|max:20',
            'course' => 'required',
            'section' => 'required|string',
            'email' => 'required|string|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
        ]);

        $chkpass = User::findorFail($id);
        if (password_verify($request->password, $chkpass->password)) {
            $request->session()->flash('messageErr', 'old password verified!');
            $update_User =  User::findorFail($id);
            $update_User->id_number = $request->input('id_number');
            $update_User->name = $request->input('firstname') . ' ' . $request->input('lastname');
            $update_User->firstname = $request->input('firstname');
            $update_User->lastname = $request->input('lastname');
            $update_User->course = $request->input('course');
            $update_User->section = $request->input('section');
            $update_User->email = $request->input('email');
            $update_User->password = Hash::make($request->input('password'));
            $update_User->status = $request->input('status') == "" ? 0 : 1;
            $update_User->save();
            $request->session()->flash('messageErr', 'Not updated password by the student!');
            $request->session()->flash('status', 'Updated Successfully!');
            return redirect('/admin/students');
        } else {
            $request->session()->flash('messageErr', 'The default password has already changed the owner!');
            $update_User =  User::findorFail($id);
            $update_User->id_number = $request->input('id_number');
            $update_User->name = $request->input('firstname') . ' ' . $request->input('lastname');
            $update_User->firstname = $request->input('firstname');
            $update_User->lastname = $request->input('lastname');
            $update_User->course = $request->input('course');
            $update_User->section = $request->input('section');
            $update_User->email = $request->input('email');
            $update_User->password = $chkpass->password;
            $update_User->status = $request->input('status') == "" ? 0 : 1;
            $update_User->save();
            $request->session()->flash('status', 'Updated Successfully!');
            return redirect('/admin/students');
            // return response()->json([
            //     'message' => 'Password Already changes!' . ' ' . $hashPass
            // ]);
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
        $student = User::find($id);
        $student->delete();
        return redirect('/admin/students')->with('status', 'Successfully deleted!');
    }


    public function profile()
    {
        // $teacher = User::where('role_as', 2)->count('id');
        return view('student.profile');
    }

    public function update_profile(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required'],
            'email' => ['required'],
            // Add more validation rules for other fields as needed
        ]);

        if ($request->has('file')) {
            // PPT Upload

            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $lesson = $file->getClientOriginalName();
            $name =  $lesson;
            $path = public_path('\file\profile');
            $file->move($path, $name);

            // Remove duplicate file
            if (File::exists($file)) {
                File::delete($file);
            }

            $data = User::find($id);

            // Update the fields
            $data->firstname = $request->input('firstname');
            $data->lastname = $request->input('lastname');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->bio = trim($request->input('bio'));
            $data->avatar = $name;
            $data->password = Auth::user()->password;

            // Save the updated data
            $data->save();

            return redirect()->back()->with('status', 'Profile update successfully.');
        } else {
            $data = User::find($id);
            $bioTrim = $request->input('bio');
            // Update the fields
            $data->firstname = $request->input('firstname');
            $data->lastname = $request->input('lastname');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->bio = trim($bioTrim);
            $data->password = Auth::user()->password;

            // Save the updated data
            $data->save();

            return redirect()->back()->with('status', 'Profile update successfully.');
        }
    }
}
