@extends('adminlte::page')

@section('content')

    <div class="container">
        <div class="container pt-3">
            <nav aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cidades</li>
                    <div class="container-fluid">
                        <div class="float-end"
                            style="display:flex; 
                flex-direction:row-reverse; ">
                            <button class="btn btn-danger">Excluir</button>
                            <button class="btn btn-warning"
                                style="margin-left:5px; 
                    margin-right:5px;">Editar</button>
                            <button class="btn btn-success"
                            onclick="location.href = 'http://127.0.0.1:8000/cidades/create'">Adicionar</button>
                        </div>
                    </div>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-responsive-md">
                <thead style="text-align: center">
                    <th>#</th>
                    <th>ID</th>
                    <th>Nome</th>
                </thead>

                <tbody>
                    @foreach ($cidades as $cidade)
                        <tr style="text-align: center">
                            <td><input type="checkbox"></td>
                            <td>{{ $cidade->id }}</td>
                            <td>{{ $cidade->descricao }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
