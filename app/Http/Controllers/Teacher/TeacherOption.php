<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Option;
use App\Models\Question;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\OptionRequest;


class TeacherOption extends Controller
{

    public function index(): View
    {
        $options = Option::all();

        return view('teacher.options.index', compact('options'));
    }

    public function create(): View
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('teacher.options.create', compact('questions'));
    }

    public function store(OptionRequest $request): RedirectResponse
    {
        Option::create($request->validated());

        return redirect()->route('teacher.teacher_options.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Option $option): View
    {
        return view('teacher.options.show', compact('option'));
    }

    public function edit($id): View
    {
        $option = Option::find($id);
        $questions = Question::all()->pluck('question_text', 'id');

        return view('teacher.options.edit', compact('option', 'questions'));
    }

    public function update(OptionRequest $request, $id): RedirectResponse
    {
        $option = Option::find($id);
        $option->update($request->validated());

        return redirect()->route('teacher.teacher_options.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id): RedirectResponse
    {
        $option = Option::find($id);
        $option->delete();

        return back()->with([
            'status' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Option::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
