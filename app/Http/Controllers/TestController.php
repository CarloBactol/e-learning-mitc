<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Result;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTestRequest;

class TestController extends Controller
{
    public function index()
    {
        $question = Question::all();
        $result = Result::where('user_id', '=', Auth::user()->id)->pluck('category_id')->toArray();

        $query = DB::table('results')
            ->select('results.category_id')
            ->leftJoin('categories', 'categories.id', '=', 'results.category_id')
            ->where('results.user_id', '=', Auth::id())
            ->get();

        $categories = Category::where('course', Auth::user()->course)
            ->get();

        // dd($categories);
        return view('student.test.index', compact('categories', 'question', 'result'));
    }

    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));
        $cat = $request->input('category_id');
        $question_id = $request->input('question_id');

        $result = auth()->user()->userResults()->create([
            'total_points' => $options->sum('points'),
            'category_id' => $cat,
            'question_id' => $question_id,
            'done' => "true",

        ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [
                $option->question_id => [
                    'option_id' => $option->id,
                    'points' => $option->points
                ]
            ];
        })->toArray();

        $result->questions()->sync($questions);

        return redirect()->route('student.test.result', $result->id);
    }

    public function test($id)
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->where('id', $id)
            ->get();

        return view('student.test.test', compact('categories'));
    }
}
