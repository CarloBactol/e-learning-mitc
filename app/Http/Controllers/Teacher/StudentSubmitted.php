<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentAnswer;

class StudentSubmitted extends Controller
{
    public function student_submitted()
    {
        $assignment = StudentAnswer::all();
        return view('teacher.assignment.student_submit', compact('assignment'));
    }
}
