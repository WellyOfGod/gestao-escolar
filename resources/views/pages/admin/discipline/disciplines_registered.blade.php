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
                    <div class="card-body">
                        <div class="section-title mt-0">Light</div>
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">Disciplina</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($disciplines as $discipline)
                                <tr>
                                    <td>{{ $discipline->name }}</td>
                                    <td>{{ $discipline->course->name }}</td>
                                    <td>@mdo</td>
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
