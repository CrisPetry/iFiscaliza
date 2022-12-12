<?php
use Carbon\Carbon;
?>
@extends('adminlte::page')

@section('content')

    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/denuncias">Denúncias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Denúncias</li>
        </ol>
    </nav>

    {!! Form::open([
        'route' => 'denuncias.store',
        'files' => true,
        'action' => 'App\Http\Controllers\DenunciaController@store',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}
    <div class="table-responsive">
        <div class="container-fluid">
            <div class="row vertical-center">
                <form class="col-8" name="formDenuncia" id="formDenuncia">



                    <div class="col-md-6 mb-5">
                        {!! Form::label('data', 'Data') !!}
                        {!! Form::date('data', Carbon::now(), ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="col-md-6 mb-5">
                        {!! Form::label('users_id', 'Usuário') !!}
                        {!! Form::select(
                            'users_id',
                            \App\Models\User::orderBy('name')->pluck('name', 'id')->toArray(),
                            Auth::user()->id,
                            ['class' => 'form-control', 'required', 'disabled'],
                        ) !!}
                    </div>

                    <div class="col-md-6 mb-5">
                        {!! Form::label('descricao', 'Descrição') !!}
                        {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 2, 'required']) !!}
                    </div>


                    <div class="col-md-6 mb-5">
                        {!! Form::label('pontoReferencia', 'Ponto de referência') !!}
                        {!! Form::textarea('pontoReferencia', null, ['class' => 'form-control', 'rows' => 2, 'required']) !!}
                    </div>

                    <div class="col-md-6 mb-5 mt-3">
                        {!! Form::label('path', 'Foto da ocorrência') !!}
                        {!! Form::file('path', [
                            'class' => 'form-control-file',
                            'required',
                            'accept' => '.jpg',
                        ]) !!}
                    </div>

                    <div class="col-md-6 mb-5">
                        {!! Form::label('infracao_id', 'Infração') !!}
                        {!! Form::select(
                            'infracao_id',
                            \App\Models\Infracao::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                            null,
                            ['class' => 'form-control', 'required'],
                        ) !!}
                    </div>

                    <div class="col-md-6 mb-5">
                        <label for="estado_id">Estado</label>
                        <select class="form-control" name="estado_id" id="estado_id">
                            <option value="">Selecione</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->descricao }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-5">
                        <label for="cidade_id">Cidade</label>
                        <select class="form-control" name="cidade_id" id="cidade_id">
                            <option value="">Selecione</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-5">
                        <label for="">Bairro</label>
                        <select class="form-control" name="bairro_id" id="bairro_id">
                            <option value="">Selecione</option>
                        </select>
                    </div>


                    <div class="col-12 mb-5">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-dark']) !!}
                        <a href="{{ URL::previous() }}" class="btn btn-dark">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $('#estado_id').on('change', function(e) {
            var est_id = e.target.value;

            //ajax
            $.get('/cidades/' + est_id, function(data) {
                //console.log(data);
                $('#cidade_id').empty();
                $.each(data, function(index, $cidadesObj) {
                    $('#cidade_id').append('<option value="' + $cidadesObj.id + '">' + $cidadesObj
                        .descricao + '</option>')
                });
            });

        });


        $('#cidade_id').on('change', function(e) {
            var est_id = e.target.value;

            //ajax
            $.get('/bairros/' + est_id, function(data) {
                //console.log(data);
                $('#bairro_id').empty();
                $.each(data, function(index, $cidadesObj) {
                    $('#bairro_id').append('<option value="' + $cidadesObj.id + '">' + $cidadesObj
                        .descricao + '</option>')
                });
            });

        });
    </script>
@endsection
