@extends('adminlte::page')

@section('content')

    <div class="container pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/cidades">Cidades</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar Cidade</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        {!! Form::open(['url' => 'cidades/store']) !!}
        <div class="table-responsive">
            <div class="container-fluid">
                <div class="row vertical-center">
                    <form
                        class="col-xs-8 col-xs-offset-2 ">

                        <div class="col-md-6 mb-3">
                            {!! Form::label('descricao', 'Nome') !!}
                            {!! Form::text('descricao', null, ['class' => 'form-control', 'required']) !!}
                        </div>


                        <div class="col align-self-end mb-3">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                            {!! Form::reset('Limpar', ['class' => 'btn btn-danger']) !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open() !!}
@stop
