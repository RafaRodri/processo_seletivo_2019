@extends('templates.master')

@section('css-view')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
@endsection()

@section('js-view')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript">
        $('.delete').on('click', function () {
            if (!confirm("Deseja mesmo apagar esse dado?")) {
                return false;
            }
        });
    </script>
@endsection()

@section('content-view')
    @if(session('success'))
        <p>{{ session('success')['messages'] }}</p>
    @endif

    <div class="row justify-content-center w-75 mx-auto mb-1">
        <div class="col-12 text-right">
            <table class="table mb-5 text-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data</th>
                    <th scope="col">Opções</th>
                </tr>
                </thead>

                <tbody>
                @if(!empty($usuarios))
                    @foreach($usuarios->usuarios as $usuario)
                    <tr>
                        <th scope="row">{!! $usuario->id !!}</th>
                        <td>{!! $usuario->nome !!}</td>
                        <td>{!! $usuario->email !!}</td>
                        <td>{!! date('d/m/Y', strtotime($usuario->dataNascimento)) !!}</td>
                        <td>
                            <a href="{{ route('usuario.editar', $usuario->id) }}">
                                <i class="fa fa-user-edit"></i>
                            </a>
                            <a class="delete" href="{{ route('usuario.deletar', $usuario->id) }}">
                                <i class="fa fa-user-minus text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Nenhum resultado encontrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection()
