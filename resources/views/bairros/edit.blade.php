@extends('adminlte::page')

@section('content')

    <div class="container pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/bairros">Bairros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Bairro</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        {!! Form::open(['route' => ['bairros.update', 'id' => $bairros->id], 'method' => 'put']) !!}
        <div class="table-responsive">
            <div class="container-fluid">
                <div class="row vertical-center">
                    <form>

                        <div class="col-6 offset-3 mt-5">
                            <div>
                                {!! Form::label('descricao', 'Nome') !!}
                                {!! Form::text('descricao', $bairros->descricao, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="mt-2">
                                {!! Form::label('cidade_id', 'Cidade') !!}
                                {!! Form::select(
                                    'cidade_id',
                                    \App\Models\Cidade::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                                    $bairros->cidade_id,
                                    ['class' => 'form-control', 'required'],
                                ) !!}


                                <div class="col-12 offset-3 mt-3 text-center" style="float: right;">
                                    {!! Form::submit('Salvar', ['class' => 'btn btn-dark']) !!}
                                    <a href="{{ URL::previous() }}" class="btn btn-dark">Cancelar</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open() !!}
@stop
