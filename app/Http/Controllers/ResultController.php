<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function show($result_id)
    {
        $result = Result::whereHas('user', function ($query) {
            $query->whereId(auth()->id());
        })->findOrFail($result_id);

        return view('student.test.result', compact('result'));
    }

    // public function history()
    // {
    //     $res = Result::whereHas('user', function ($query) {
    //         $query->whereId(auth()->id());
    //     })->findOrFail($result_id);

    //     return view('student.test.result', compact('result'));
    // }
}
