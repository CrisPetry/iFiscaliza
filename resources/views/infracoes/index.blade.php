@extends('layouts.default')

@section('content')

    <div class="container-fluid pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb" style="padding-top: 10px; padding-bottom:10px;">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Infracões</li>
                <div class="col-12">
                    <a href="{{ route('infracoes.create', []) }}" class="btn btn-sm btn-dark" style="float: right; margin-top:-25px;">
                        Adicionar&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
                </div>
            </ol>
        </nav>
    </div>


    {!! Form::open(['name' => 'form_name', 'route' => 'infracoes']) !!}
    <div class="input-group input-group-sm mb-3" style="width: 100%;">
        <input type="text" name="desc_filtro" class="form-control" aria-describedby="basic-addon2">
        <div class="input-group-append inputGroup-sizing-sm">
            <button type="submit" name="search" id="search-id" class="btn btn-sm btn-dark">
                <i class="fa fa-search"></i></button>
        </div>
    </div>
    {!! Form::close() !!}

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead style="text-align: center">
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </thead>

                <tbody>
                    @foreach ($infracoes as $infracao)
                        <tr style="text-align: center">
                            <td>{{ $infracao->id }}</td>
                            <td>{{ $infracao->descricao }}</td>
                            <td>

                                <a href="{{ route('infracoes.edit', ['id' => \Crypt::encrypt($infracao->id)]) }}"
                                    class="btn-sm btn-dark">
                                    <i class="fa fa-edit"></i></a>

                                <a href="#" onclick="return ConfirmaExclusao({{ $infracao->id }})"
                                    class="btn-sm btn-dark">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $infracoes->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('table-delete')
    "infracoes"
@endsection
