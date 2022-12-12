@extends('layouts.default')

@section('content')

    <div class="container-fluid pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb" style="padding-top: 10px; padding-bottom:10px;">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead style="text-align: center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Tipo Usuário</th>
                </thead>

                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr style="text-align: center">
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->cpf }}</td>
                            <td>{{ $usuario->telefone }}</td>
                            <td>{{ $usuario->tipoUsuario->descricao }}</td>
                            
                            {{-- <td>
                                <a href="{{ route('usuarios.edit', ['id' => \Crypt::encrypt($usuario->id)]) }}"
                                    class="btn-sm btn-dark">
                                    <i class="fa fa-edit"></i></a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $usuarios->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('table-delete')
    "usuarios"
@endsection
