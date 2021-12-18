<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discipline\DisciplineStoreRequest;
use App\Models\Course;
use App\Models\Discipline;
use Illuminate\Support\Fluent;

class DisciplineController extends Controller
{

    private function viewParams(string $route, $discipline): array
    {
        return [
            'route'          => $route,
            'courses'        => Course::all(['id', 'name']),
            'discipline'     => $discipline
        ];
    }

    public function create()
    {

        $discipline = new Fluent();
        $discipline->course = new Fluent();

        return view('pages.admin.crud_disciplines',
            $this->viewParams(route('discipline.store'), $discipline));
    }


    public function store(DisciplineStoreRequest $request)
    {
        $data = new Fluent($request->validated());

        $discipline = Discipline::create($data->toArray());

        return redirect()->route('discipline.edit', $discipline);
    }


    public function edit(Discipline $discipline)
    {
        return view('pages.admin.crud_disciplines',
            $this->viewParams(route('discipline.update', $discipline), $discipline));
    }


    public function update(DisciplineStoreRequest $request, Discipline $discipline)
    {
        $data = new Fluent($request->validated());
        $discipline->load('course');

        $discipline->update($data->toArray());

        return redirect()->route('discipline.edit', $discipline);
    }


    public function destroy(Discipline $discipline)
    {
        $discipline->delete();

        return redirect()->route('discipline.create');
    }

}
