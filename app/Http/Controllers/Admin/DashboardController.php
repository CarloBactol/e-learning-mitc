<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = User::where('role_as', 2)->count('id');
        $student = User::where('role_as', 0)->count('id');
        $category = Category::count('id');
        $question = Question::count('id');
        $option = Option::count('id');
        return view('admin.dashboard', compact('teacher', 'student', 'category', 'question', 'option'));
    }


    public function profile()
    {
        // $teacher = User::where('role_as', 2)->count('id');
        return view('admin.profile');
    }

    public function update(Request $request, $id)
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
