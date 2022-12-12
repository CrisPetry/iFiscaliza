@extends('layouts.default')

@section('content')

    <div class="container-fluid pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb" style="padding-top: 10px; padding-bottom:10px;">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Estados</li>
                <div class="col-12">
                    <a href="{{ route('estados.create', []) }}" class="btn btn-sm btn-dark"
                        style="float: right; margin-top:-25px;">
                        Adicionar&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
                </div>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead style="text-align: center">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th>Ações</th>
                </thead>

                <tbody>
                    @foreach ($estados as $estado)
                        <tr style="text-align: center">
                            <td>{{ $estado->id }}</td>
                            <td>{{ $estado->descricao }}</td>
                            <td>{{ $estado->sigla }}</td>
                            </td>
                            <td>

                                <a href="{{ route('estados.edit', ['id' => \Crypt::encrypt($estado->id)]) }}"
                                    class="btn-sm btn-dark">
                                    <i class="fa fa-edit"></i></a>

                                <a href="#" onclick="return ConfirmaExclusao({{ $estado->id }})"
                                    class="btn-sm btn-dark">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $estados->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('table-delete')
    "estados"
@endsection
