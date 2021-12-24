<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CourseStoreRequest;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.admin.course.course_registered');
    }


    /**
     * @return View
     */
    public function create(): View
    {
        return view('pages.admin.course.crud_courses', [
            'route'   => route('course.store'),
        ]);
    }


    /**
     * @param CourseStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CourseStoreRequest $request): RedirectResponse
    {
        $course = Course::create($request->validated());

        return redirect()->route('course.edit', $course);
    }


    /**
     * @param Course $course
     * @return View
     */
    public function edit(Course $course): View
    {
        return view('pages.admin.course.crud_courses', [
            'route'   => route('course.update', $course),
            'course' => $course
        ]);
    }

    /**
     * @param CourseStoreRequest $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function update(CourseStoreRequest $request, Course $course): RedirectResponse
    {
        $course->update($request->validated());

        return redirect()->route('course.edit', $course);
    }


    /**
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('course.create');
    }

}
