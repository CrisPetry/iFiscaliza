@extends('adminlte::page')

@section('content')

    <div class="container pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/bairros">Bairros</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar Bairros</li>
            </ol>
        </nav>
    </div>

    {!! Form::open(['route' => 'bairros.store']) !!}
    <div class="table-responsive">
        <div class="container-fluid">
            <div class="row vertical-center">
                <form>

                    <div class="col-6 offset-3 mt-5">
                        <div>
                            {!! Form::label('descricao', 'Nome') !!}
                            {!! Form::text('descricao', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="mt-2">
                            {!! Form::label('cidade_id', 'Cidade:') !!}
                            {!! Form::select(
                                'cidade_id',
                                \App\Models\Cidade::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                                null,
                                ['class' => 'form-control', 'required'],
                            ) !!}
                        </div>

                        <div class="col-12 offset-3 mt-3 text-center" style="float: right;">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-dark']) !!}
                            <a href="{{ URL::previous() }}" class="btn btn-dark">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {!! Form::open() !!}
@stop
