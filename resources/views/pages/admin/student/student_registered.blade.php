@extends('layouts.main.layout')

@section('custom-section-header')
    @component('components.section-header', [
        'title'         => 'Alunos Cadastrados',
        'menuHeader'    => 'Educacional' ,
        'navLink'       => 'Cadastro',
        'currentPage'   => 'Aluno',
    ])
    @endcomponent
@endsection
@section('title', 'Cadastrar Aluno')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary text-white" href="{{ route('student.create') }}">
                            Cadastrar Aluno
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Dt.Nascimento</th>
                                <th scope="col">Cep</th>
                                <th scope="col">Rua</th>
                                <th scope="col">Complemento</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($students as $student)
                                <form id="form-destroy"
                                      action="{{ route('student.destroy', $student->id) }}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->cpf }}</td>
                                    <td>{{ $student->dt_birth }}</td>
                                    <td>{{ $student->zipcode }}</td>
                                    <td>{{ $student->street }}</td>
                                    <td>{{ $student->complement }}</td>
                                    <td>{{ $student->district }}</td>
                                    <td>{{ $student->uf }}</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('student.edit', $student->id) }}"
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
                                'paginator' => $students
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
