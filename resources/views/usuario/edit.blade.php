@extends('adminlte::page')

@section('content')

    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
        </ol>
    </nav>

    {!! Form::open(['url' => "usuarios/$usuario->id/update", 'method' => 'put']) !!}

    <div class="table-responsive">
        <div class="col-md-6 mb-3">
            {!! Form::label('name', 'Nome') !!}
            {!! Form::text('name', $usuario->name, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="col-md-6 mb-3">
            {!! Form::label('telefone', 'Telefone') !!}
            {!! Form::text('telefone', $usuario->telefone, ['class' => 'form-control']) !!}
        </div>

        {{-- <div class="col-md-6 mb-3">
        {!! Form::label('password', 'Senha') !!}
        {!! Form::password('password', [
            'id' => 'password',
            'class' => 'form-control',
            'autocomplete' => 'off',
            'required',
        ]) !!}
    </div>

    <div class="col-md-6 mb-3">
        {!! Form::label('password', 'Confirmar Senha') !!}
        {!! Form::password('password', [
            'id' => 'password',
            'class' => 'form-control',
            'autocomplete' => 'off',
            'required',
        ]) !!}
    </div> --}}

        <div class="col align-self-start mb-3">
            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
            {!! Form::reset('Limpar', ['class' => 'btn btn-danger']) !!}
        </div>
    </div>

    {!! Form::open() !!}
@stop
