<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Category;
use App\Models\Question;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\QuestionRequest;

class TeacherQuestion extends Controller
{

    public function index(): View
    {
        $questions = Question::all();

        return view('teacher.questions.index', compact('questions'));
    }

    public function create(): View
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('teacher.questions.create', compact('categories'));
    }

    public function store(QuestionRequest $request): RedirectResponse
    {
        Question::create($request->validated());

        return redirect()->route('teacher.teacher_questions.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Question $question): View
    {
        return view('teacher.questions.show', compact('question'));
    }

    public function edit($id): View
    {
        $question =  Question::find($id);
        $categories = Category::all()->pluck('name', 'id');

        return view('teacher.questions.edit', compact('question', 'categories'));
    }

    public function update(QuestionRequest $request, $id): RedirectResponse
    {
        $question =  Question::find($id);
        $question->update($request->validated());

        return redirect()->route('teacher.teacher_questions.index')->with([
            'status' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id): RedirectResponse
    {
        $question =  Question::find($id);
        $question->delete();

        return back()->with([
            'status' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Question::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
