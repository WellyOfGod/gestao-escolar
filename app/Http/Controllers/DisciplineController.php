<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discipline\DisciplineStoreRequest;
use App\Models\{Course, Discipline};
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Fluent;

class DisciplineController extends Controller
{

    /**
     * @param string $route
     * @param $discipline
     * @return array
     */
    private function viewParams(string $route, $discipline): array
    {
        return [
            'route' => $route,
            'courses' => Course::all(['id', 'name']),
            'discipline' => $discipline
        ];
    }


    /**
     * @return View
     */
    public function index(): View
    {
        return view('pages.admin.discipline.disciplines_registered');
    }


    /**
     * @return View
     */
    public function create(): View
    {

        $discipline = new Fluent();
        $discipline->course = new Fluent();

        return view('pages.admin.discipline.crud_disciplines',
            $this->viewParams(route('discipline.store'), $discipline));
    }


    /**
     * @param DisciplineStoreRequest $request
     * @return RedirectResponse
     */
    public function store(DisciplineStoreRequest $request): RedirectResponse
    {
        $data = new Fluent($request->validated());

        $discipline = Discipline::create($data->toArray());

        return redirect()->route('discipline.edit', $discipline);
    }


    /**
     * @param Discipline $discipline
     * @return View
     */
    public function edit(Discipline $discipline): View
    {
        return view('pages.admin.discipline.crud_disciplines',
            $this->viewParams(route('discipline.update', $discipline), $discipline));
    }


    /**
     * @param DisciplineStoreRequest $request
     * @param Discipline $discipline
     * @return RedirectResponse
     */
    public function update(DisciplineStoreRequest $request, Discipline $discipline): RedirectResponse
    {
        $data = new Fluent($request->validated());
        $discipline->load('course');

        $discipline->update($data->toArray());

        return redirect()->route('discipline.edit', $discipline);
    }


    /**
     * @param Discipline $discipline
     * @return RedirectResponse
     */
    public function destroy(Discipline $discipline): RedirectResponse
    {
        $discipline->delete();

        return redirect()->route('discipline.create');
    }

}
