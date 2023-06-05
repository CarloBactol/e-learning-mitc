<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
