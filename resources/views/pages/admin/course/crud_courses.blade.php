@extends('layouts.main.layout')

@if(request()->routeIs('course.edit'))
@section('custom-section-header')
    @component('components.section-header', [
        'title'         => 'Editar Informações do Curso - '. $course->name,
        'menuHeader'    => 'Educacional' ,
        'navLink'       => 'Cadastro',
        'currentPage'   => 'Curso',
    ])
    @endcomponent
@endsection
@else
    @section('title', 'Cadastrar Curso')
@endif

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form-save" action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @if(request()->routeIs('course.edit'))
                            @method('PUT')
                        @endif
                        @csrf
                        @isset($discipline->id)
                            <div class="card-header d-flex justify-content-between">
                                <a class="btn btn-primary text-white" href="{{ route('course.create') }}">
                                    Cadastrar Curso
                                </a>
                                <a href="{{ route('course.index') }}" class="btn btn-primary float-right">
                                    Ver Cursos
                                </a>
                            </div>
                        @else
                            <div class="card-header d-flex justify-content-between">
                                <h4>Informações do Curso</h4>
                                <a href="{{ route('course.index') }}" class="btn btn-primary float-right">
                                    Ver Cursos
                                </a>
                            </div>
                        @endisset
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{old('name') ?? $course->name ?? ''}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Carga Horária</label>
                                <input type="text" name="workload"
                                       class="form-control @error('workload') is-invalid @enderror"
                                       value="{{old('workload') ?? $course->workload ?? ''}}">
                                @error('workload')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </form>
                    @isset($course->id)
                        <div class="card-footer d-flex justify-content-between">
                            <form action="{{ $route }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-delete">Deletar
                                </button>
                            </form>
                            <button form="form-save" class="btn btn-primary">Salvar</button>
                        </div>
                    @else
                        <div class="d-flex justify-content-end">
                            <div class="card-footer d-flex justify-content-end">
                                <button form="form-save" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
