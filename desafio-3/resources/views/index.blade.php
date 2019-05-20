@extends('templates.master')

@section('content-view')
    @if(session('success')['success'])
        <p>Usuário cadastrado com sucesso</p>
    @else
        <p>{!! session('success')['mensagem'] !!}</p>
    @endif

    <form action="{{route('usuario.salvar')}}" method="post" class="form-group row">
    {{ csrf_field() }}
    <!-- Nome -->
        <div class="row justify-content-center w-75 mx-auto mb-1">
            <div class="col-2 text-right">
                <label for="inputName">Nome</label>
            </div>
            <div class="col-10">
                <input type="text" name="nome" class="form-control" id="inputName" required>
            </div>
        </div>

        <!-- Email -->
        <div class="row justify-content-center w-75 mx-auto mb-1">
            <div class="col-2 text-right ">
                <label for="inputEmail">Email</label>
            </div>
            <div class="col-10 ">
                <input type="email" name="email" class="form-control" id="inputEmail" required>
            </div>
        </div>

        <!-- Senha e Nascimento -->
        <div class="row justify-content-center w-75 mx-auto mb-1">
            <div class="col-2 text-right ">
                <label for="inputSenha">Senha</label>
            </div>
            <div class="col-3">
                <input type="password" name="senha" class="form-control" id="inputSenha" required>
            </div>
            <div class="col-3 text-right ">
                <label for="inputNascimento">Data de nascimento</label>
            </div>
            <div class="col-4">
                <input type="date" name="dataNascimento" class="form-control" id="inputNascimento" required>
            </div>
        </div>

        <!-- Submit -->
        <div class="row justify-content-center w-75 mx-auto">
            <div class="col-6 text-center">
                <button type="submit" class="btn-lg btn-primary">Salvar</button>
            </div>
        </div>
    </form>

@endsection()
