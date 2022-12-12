@extends('adminlte::page')

@section('content')

    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/usuarios">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Usuários</li>
        </ol>
    </nav>

    {!! Form::open(['route' => 'usuarios.store']) !!}
    <div class="table-responsive">
        <div class="container-fluid">
            <div class="row vertical-center">
                <form>


                    <div class="col-6 mt-2">
                        {!! Form::label('name', 'Nome') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="col-6 mt-2">
                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
                    </div>



                    <div class="col-6 mt-3">
                        {!! Form::label('cpf', ' CPF') !!}
                        {!! Form::text('cpf', null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <div class="col-6 mt-3">
                        {!! Form::label('telefone', 'Telefone') !!}
                        {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
                    </div>



                    <div class="col-6 mt-2">
                        {!! Form::label('password', 'Senha') !!}
                        {!! Form::password('password', [
                            'id' => 'password',
                            'class' => 'form-control',
                            'autocomplete' => 'on',
                            'required',
                        ]) !!}
                    </div>



                    <div class="col-6 mt-2">
                        {!! Form::label('tipo_usuario_id', 'Tipos de Usuário:') !!}
                        {!! Form::select(
                            'tipo_usuario_id',
                            \App\Models\TipoUsuario::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                            1,
                            ['class' => 'form-control', 'required', 'disabled'],
                        ) !!}
                    </div>

                    <div class="col-12 mt-5 text-center">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-dark']) !!}
                        <a href="{{ URL::previous() }}" class="btn btn-dark">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {!! Form::open() !!}
@stop


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $(document).ready(function($) {
        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
    });
</script>
