@extends('layouts.main.layout')

@section('custom-section-header')
    @component('components.section-header', [
        'title'         => 'Cursos Cadastrados',
        'menuHeader'    => 'Educacional' ,
        'navLink'       => 'Cadastro',
        'currentPage'   => 'Curso',
    ])
    @endcomponent
@endsection
@section('title', 'Cadastrar Curso')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary text-white" href="{{ route('course.create') }}">
                            Cadastrar Curso
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Nome</th>
                                <th scope="col">Carga Horária</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($courses as $course)
                                <form id="form-destroy"
                                      action="{{ route('course.destroy', $course->id) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->workload }}</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('course.edit', $course->id) }}"
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
                                'paginator' => $courses
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
