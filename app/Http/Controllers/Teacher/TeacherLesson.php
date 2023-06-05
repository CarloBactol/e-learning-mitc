<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\CourseSection;
use App\Rules\FileExtensionRule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TeacherLesson extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('teacher.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = CourseSection::all();
        $section = Section::all();
        return view('teacher.lesson.create', compact('class', 'section'));
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
            'chapter' => 'required',
            'course' => 'required',
            'section' => 'required',
            'lesson_name' => 'required',
            'file' => 'required|file|mimes:mp4,ppt,pptx,pdf',
        ]);

        if ($request->has('file')) {
            // PPT Upload

            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $lesson = $file->getClientOriginalName();
            $name =  $lesson;
            $path = public_path('\file\uploads');
            $file->move($path, $name);


            // Save
            Lesson::create([
                'chapter' => $request->chapter,
                'course' => $request->course,
                'section' => $request->section,
                'lesson_name' => $request->lesson_name,
                'file' => $name,
            ]);
        }

        return redirect()->route('teacher.teacher_lessons.index')->with('status', 'New lesson created Successfully');
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
        $class = CourseSection::all();
        $section = Section::all();
        $lessons = Lesson::find($id);
        return view('teacher.lesson.edit', compact('class', 'lessons', 'section'));
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
            'chapter' => 'required',
            'course' => 'required',
            'section' => 'required',
            'lesson_name' => 'required',
            'file' => 'file|mimes:mp4,ppt,pptx,pdf',
        ]);

        if ($request->has('file')) {
            // PPT Upload

            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $lesson = $file->getClientOriginalName();
            $name =  $lesson;
            $path = public_path('\file\uploads');

            $file->move($path, $name);

            if (File::exists($file)) {
                File::delete($file);
            }

            // Update
            $update_lesson = Lesson::find($id);
            $update_lesson->chapter =  $request->chapter;
            $update_lesson->course =  $request->course;
            $update_lesson->section =  $request->section;
            $update_lesson->lesson_name =  $request->lesson_name;
            $update_lesson->save();
            return redirect()->route('teacher.teacher_lessons.index')->with('status', 'New lesson update Successfully');
        } else {

            $update_lesson = Lesson::find($id);
            $update_lesson->chapter =  $request->chapter;
            $update_lesson->course =  $request->course;
            $update_lesson->section =  $request->section;
            $update_lesson->lesson_name =  $request->lesson_name;
            $update_lesson->save();
            return redirect()->route('teacher.teacher_lessons.index')->with('status', 'New lesson update Successfully');
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
        $lesson =  Lesson::find($id);
        $lesson->delete();
        return back()->with([
            'status' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
