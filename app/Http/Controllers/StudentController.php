<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('pages.users.crud_students', [
            'route'   => route('student.store'),
        ]);
    }


    public function store(StudentStoreRequest $request)
    {
        $student = Student::create($request->validated());

        return redirect()->route('student.edit', $student);
    }


    public function show($id)
    {

    }


    public function edit(Student $student)
    {
        return view('pages.users.crud_students', [
            'route'   => route('student.update', $student),
            'student' => $student
        ]);
    }


    public function update(StudentStoreRequest $request, Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('student.edit', $student);
    }


    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.create');
    }
}
