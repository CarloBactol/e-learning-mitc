<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Option;
use App\Models\Section;
use App\Models\Category;
use App\Models\Question;
use App\Models\CourseSection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;


class TeacherCategory extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('teacher.categories.index', compact('categories'));
    }

    public function create(): View
    {
        $class = CourseSection::all();
        $section = Section::all();
        return view('teacher.categories.create', compact('class', 'section'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('teacher.teacher_categories.index')->with([
            'status' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Category $category): View
    {
        return view('teacher.categories.show', compact('category'));
    }

    public function edit($id): View
    {
        $category = Category::find($id);
        $class = CourseSection::all();
        $section = Section::all();
        return view('teacher.categories.edit', compact('category', 'class', 'section'));
    }

    public function update(CategoryRequest $request, $id): RedirectResponse
    {
        $category = Category::find($id);
        $category->update($request->validated());

        return redirect()->route('teacher.teacher_categories.index')->with([
            'status' => 'successfully updated!',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id): RedirectResponse
    {
        $category =  Category::find($id);
        $category->delete();
        return back()->with([
            'status' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Category::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
