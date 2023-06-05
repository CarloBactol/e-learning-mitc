<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{

    public function index(): View
    {
        $categories = Category::all();
        $class = CourseSection::all();
        $section = Section::all();
        return view('admin.categories.index', compact('categories', 'class', 'section'));
    }

    public function create(): View
    {

        $class = CourseSection::all();
        $section = Section::all();
        return view('admin.categories.create', compact('class', 'section'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('admin.categories.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        $class = CourseSection::all();
        $section = Section::all();
        return view('admin.categories.edit', compact('category', 'class', 'section'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Category::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function uploadCourse(Request $request, $id)
    {
        $this->validate($request, ['course' => 'required', 'section' => 'required']);

        $updateCat = Category::find($id);
        $updateCat->course = $request->data;
        $updateCat->update();
        return response()->json(['message' => "Update Success"]);
    }
}
