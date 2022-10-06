@extends('adminlte::page')

@section('content')

    <div class="container pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tipo de Usuários</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <table class="table table-striped table-bordered table-hover table-responsive-md">
            <thead style="text-align: center">
                <th>ID</th>
                <th>Descrição</th>
            </thead>

            <tbody>
                @foreach ($tipoUsuarios as $tipoUsuario)
                    <tr style="text-align: center">
                        <td>{{ $tipoUsuario->id }}</td>
                        <td>{{ $tipoUsuario->descricao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
