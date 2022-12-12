@extends('adminlte::page')

@section('content')

    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/denuncias">Denúncias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Denúncia {{ $denuncias->id }}</li>
        </ol>
    </nav>

    {!! Form::open(['denuncias.show', 'id' => $denuncias->id]) !!}
    <div class="table-responsive">
        <div class="container-fluid">
            <div class="row vertical-center">
                <form class="col-8">



                    <div class="col-md-6 mb-5">
                        {!! Form::label('data', 'Data') !!}
                        {!! Form::text('data', Carbon\Carbon::parse($denuncias->data)->format('d/m/Y'), [
                            'class' => 'form-control',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>


                    <div class="col-md-6 mb-5">
                        {!! Form::label('users_id', 'Usuário') !!}
                        {!! Form::text('users_id', $denuncias->user->name, ['class' => 'form-control', 'required', 'disabled']) !!}
                    </div>


                    <div class="col-md-6 mb-5">
                        {!! Form::label('descricao', 'Descrição') !!}
                        {!! Form::text('descricao', $denuncias->descricao, ['class' => 'form-control', 'required', 'disabled']) !!}
                    </div>


                    <div class="col-md-6 mb-5">
                        {!! Form::label('pontoReferencia', 'Ponto de referência') !!}
                        {!! Form::text('pontoReferencia', $denuncias->pontoReferencia, [
                            'class' => 'form-control',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>

                    <div class="col-md-6 mb-5">
                        {!! Form::label('estado_id', 'Estado') !!}
                        {!! Form::text('estado_id', $denuncias->estado->descricao, ['class' => 'form-control', 'required', 'disabled']) !!}
                    </div>


                    <div class="col-md-6 mb-5">
                        {!! Form::label('cidade_id', 'Cidade') !!}
                        {!! Form::text('cidade_id', $denuncias->cidade->descricao, ['class' => 'form-control', 'required', 'disabled']) !!}
                    </div>

                    <div class="col-md-6 mb-5">
                        {!! Form::label('bairro_id', 'Bairro') !!}
                        {!! Form::text('bairro_id', $denuncias->bairro->descricao, ['class' => 'form-control', 'required', 'disabled']) !!}
                    </div>
                    
                    <div class="col-md-6 mb-5">
                        {!! Form::label('status_id', 'Status') !!}
                        @if ($denuncias->status_id != null)
                            {!! Form::text('status_id', $denuncias->status->descricao, ['class' => 'form-control', 'required', 'disabled']) !!}
                        @else
                            {!! Form::text('status_id', 'Análise Pendente', ['class' => 'form-control', 'required', 'disabled']) !!}
                        @endif
                    </div>
                    
                    <div class="col-md-12 mb-5">
                        {!! Form::label('infracao_id', 'Infração') !!}
                        {!! Form::text('infracao_id', $denuncias->infracao->descricao, [
                            'class' => 'form-control',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>


                    <div class="col-md-12 mb-5">
                        {!! Form::label('path', 'Foto da ocorrência') !!}<br>
                        <img src="{{ asset(str_replace('public', 'storage', $denuncias->path)) }}" alt=""
                            title="" height="300" width="425"></a>
                    </div>


                    <a href="{{ URL::previous() }}" class="btn btn-dark mb-5 ml-2">Voltar</a>
                </form>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop
