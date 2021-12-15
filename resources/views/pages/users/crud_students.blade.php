@extends('layouts.main.layout')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @if(request()->routeIs('student.edit'))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="card-header d-flex justify-content-between">
                            @isset($student->id)
                            <h4>Atualizar Dados do Aluno</h4>
                                <a class="btn btn-primary text-white"  href="{{ route('student.create') }}">
                                    Cadastrar Novo Aluno
                                </a>
                            @else
                            <h4>Dados do Aluno</h4>
                            @endisset
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{old('name') ?? $student->name ?? ''}}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{old('email') ?? $student->email ?? ''}}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>CPF</label>
                                <input type="text" name="cpf"
                                       class="form-control @error('cpf') is-invalid @enderror" placeholder="999.999.999-99"
                                       value="{{old('cpf') ?? $student->cpf ?? ''}}">
                                @error('cpf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Data de Nascimento</label>
                                <input type="date" name="dt_birth"
                                       class="form-control @error('dt_birth') is-invalid @enderror"
                                       value="{{old('dt_birth') ?? $student->dt_birth ?? ''}}">
                                @error('dt_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Endereço do Aluno</label>
                            </div>
                            <div class="form-group">
                                <label>CEP</label>
                                <input type="text" name="zipcode"
                                       class="form-control @error('zipcode') is-invalid @enderror"
                                       value="{{old('zipcode') ?? $student->zipcode ?? ''}}">
                                @error('zipcode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Logradouro</label>
                                <input type="text" name="street"
                                       class="form-control @error('street') is-invalid @enderror"
                                       value="{{old('street') ?? $student->street ?? ''}}">
                                @error('street')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" name="complement"
                                       class="form-control @error('complement') is-invalid @enderror"
                                       value="{{old('complement') ?? $student->complement ?? ''}}">
                                @error('complement')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" name="district"
                                       class="form-control @error('district') is-invalid @enderror"
                                       value="{{old('district') ?? $student->district ?? ''}}">
                                @error('district')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>UF</label>
                                <input type="text" name="uf"
                                       class="form-control @error('uf') is-invalid @enderror"
                                       value="{{old('uf') ?? $student->uf ?? ''}}">
                                @error('uf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </form>
                    <div class="card-footer d-flex justify-content-between">
                        @isset($student->id)
                            <form action="{{ $route }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">Deletar Aluno</button>
                            </form>
                        @endisset
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
