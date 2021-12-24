@extends('layouts.main.layout')

@if(request()->routeIs('discipline.edit'))
@section('custom-section-header')
    @component('components.section-header', [
        'title'         => 'Editar Disciplina - '. $discipline->name,
        'menuHeader'    => 'Educacional' ,
        'navLink'       => 'Cadastro',
        'currentPage'   => 'Disciplina',
    ])
    @endcomponent
@endsection
@else
    @section('title', 'Cadastrar Disciplina')
@endif

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form-save" action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @if(request()->routeIs('discipline.edit'))
                            @method('PUT')
                        @endif
                        @csrf
                        @isset($discipline->id)
                            <div class="card-header d-flex justify-content-between">
                                <a class="btn btn-primary text-white" href="{{ route('discipline.create') }}">
                                    Cadastrar Disciplina
                                </a>
                                <a href="{{ route('discipline.index') }}" class="btn btn-primary">
                                    Ver Disciplinas
                                </a>
                            </div>
                        @else
                            <div class="card-header d-flex justify-content-between">
                                <h4>Informações da Disciplina</h4>
                                <a href="{{ route('discipline.index') }}" class="btn btn-primary">
                                    Ver Disciplinas
                                </a>
                            </div>
                        @endisset
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{old('name') ?? $discipline->name ?? ''}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Selecionar Curso</label>
                                <select name="course_id" id="course_id"
                                        class="form-control @error('course_id') is-invalid @enderror">
                                    <option selected value="">Selecione</option>
                                    @forelse($courses as $course)
                                        <option value="{{ $course->id }}"
                                            @if (old('course_id', $discipline->course_id) === $course->id)
                                                selected
                                            @endif>
                                            {{ $course->name }}
                                        </option>
                                    @empty
                                        <option selected disabled>Nenhum curso cadastrado</option>
                                    @endforelse
                                </select>
                                @error('course_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </form>
                    @isset($discipline->id)
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
