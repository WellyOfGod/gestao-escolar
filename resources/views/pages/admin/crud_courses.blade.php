@extends('layouts.main.layout')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @if(request()->routeIs('course.edit'))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="card-header d-flex justify-content-between">
                            @isset($course->id)
                            <h4>Atualizar Informações do Curso</h4>
                                <a class="btn btn-primary text-white"  href="{{ route('course.create') }}">
                                    Cadastrar Novo Curso
                                </a>
                            @else
                            <h4>Informações do Curso</h4>
                            @endisset
                        </div>
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
                    </form>
                    <div class="card-footer d-flex justify-content-between">
                        @isset($course->id)
                            <form action="{{ $route }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">Deletar Curso</button>
                            </form>
                        @endisset
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
