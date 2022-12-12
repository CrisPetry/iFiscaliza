@extends('layouts.default')

@section('content')

    <div class="container-fluid pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb" style="padding-top: 10px; padding-bottom:10px;">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bairros</li>
                <div class="col-12">
                    <a href="{{ route('bairros.create', []) }}" class="btn btn-sm btn-dark"
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
                    <th>Descrição</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </thead>

                <tbody>
                    @foreach ($bairros as $bairro)
                        <tr style="text-align: center">
                            <td>{{ $bairro->id }}</td>
                            <td>{{ $bairro->descricao }}</td>
                            <td>{{ $bairro->cidade->descricao }}</td>
                            <td>

                                <a href="{{ route('bairros.edit', ['id' => \Crypt::encrypt($bairro->id)]) }}"
                                    class="btn-sm btn-dark">
                                    <i class="fa fa-edit"></i></a>

                                <a href="#" onclick="return ConfirmaExclusao({{ $bairro->id }})"
                                    class="btn-sm btn-dark">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $bairros->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('table-delete')
    "bairros"
@endsection
