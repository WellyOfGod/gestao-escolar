@extends('layouts.main.layout')

@section('custom-section-header')
    @component('components.section-header', [
        'title'         => 'Disciplinas Cadastradas',
        'menuHeader'    => 'Educacional' ,
        'navLink'       => 'Cadastro',
        'currentPage'   => 'Disciplina',
    ])
    @endcomponent
@endsection
@section('title', 'Cadastrar Disciplina')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary text-white" href="{{ route('discipline.create') }}">
                            Cadastrar Disciplina
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Disciplina</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($disciplines as $discipline)
                                <form id="form-destroy"
                                      action="{{ route('discipline.destroy', $discipline->id) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <tr>
                                    <td>{{ $discipline->name }}</td>
                                    <td>{{ $discipline->course->name }}</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('discipline.edit', $discipline->id) }}"
                                               class="btn btn-icon btn-primary">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button form="form-destroy" class="btn btn-icon btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @component('components.paginator', [
                                'paginator' => $disciplines
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
