<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.admin.student.crud_students');
    }


    /**
     * @return View
     */
    public function create(): View
    {
        return view('pages.admin.student.crud_students', [
            'route'   => route('student.store'),
        ]);
    }


    /**
     * @param StudentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(StudentStoreRequest $request): RedirectResponse
    {
        $student = Student::create($request->validated());

        return redirect()->route('student.edit', $student);
    }


    /**
     * @param Student $student
     * @return View
     */
    public function edit(Student $student): View
    {
        return view('pages.admin.student.crud_students', [
            'route'   => route('student.update', $student),
            'student' => $student
        ]);
    }


    /**
     * @param StudentStoreRequest $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(StudentStoreRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        return redirect()->route('student.edit', $student);
    }


    /**
     * @param Student $student
     * @return RedirectResponse
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('student.create');
    }
}
