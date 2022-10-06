@extends('adminlte::page')

@section('content')

    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Usuário</li>
        </ol>
    </nav>

    {!! Form::open(['url' => 'usuarios/store']) !!}
    <div class="table-responsive">
        <div class="container-fluid">
            <div class="row vertical-center">
                <form
                    class="col-xs-8 col-xs-offset-2  col-sm-6 col-sm-offset-3 col-md-4 col-sm-offset-4 col-lg-2 col-lg-offset-5">

                    <div class="col-md-6 mb-3">
                        {!! Form::label('name', 'Nome') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="col-md-6 mb-3">
                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
                    </div>


                    <div class="col-md-6 mb-3">
                        {!! Form::label('cpf', ' CPF') !!}
                        {!! Form::text('cpf', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="col-md-6 mb-3">
                        {!! Form::label('telefone', 'Telefone') !!}
                        {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
                    </div>



                    <div class="col-md-6 mb-3">
                        {!! Form::label('password', 'Senha') !!}
                        {!! Form::password('password', [
                            'id' => 'password',
                            'class' => 'form-control',
                            'autocomplete' => 'off',
                            'required',
                        ]) !!}
                    </div>

                    <div class="col-md-6 mb-3">
                        {!! Form::label('telefone', 'Confirmar Senha') !!}
                        {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
                    </div>


                    <div class="col-md-4 mb-3">
                        {!! Form::label('tipo_usuario_id', 'Tipo de Usuário') !!}
                        {!! Form::select('tipo_usuario_id', ['1' => 'Administrador', '2' => 'Denunciante'], '2', [
                            'class' => 'form-control',
                            'required',
                            'readonly',
                            'disabled'
                        ]) !!}
                    </div>

                    <div class="col align-self-end mb-3">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                        {!! Form::reset('Limpar', ['class' => 'btn btn-danger']) !!}
                    </div>
                </form>
            </div>
        </div>
    </div>

    {!! Form::open() !!}
@stop
