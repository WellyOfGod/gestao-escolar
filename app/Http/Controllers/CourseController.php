<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Models\Course;

class CourseController extends Controller
{

    public function create()
    {
        return view('pages.admin.crud_courses', [
            'route'   => route('course.store'),
        ]);
    }


    public function store(CourseStoreRequest $request)
    {
        $course = Course::create($request->validated());

        return redirect()->route('course.edit', $course);
    }


    public function edit(Course $course)
    {
        return view('pages.admin.crud_courses', [
            'route'   => route('course.update', $course),
            'course' => $course
        ]);
    }


    public function update(CourseStoreRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()->route('course.edit', $course);
    }


    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.create');
    }
}
