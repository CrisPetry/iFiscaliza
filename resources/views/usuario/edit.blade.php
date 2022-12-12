@extends('adminlte::page')

@section('content')

    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/usuarios">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
        </ol>
    </nav>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['usuarios.update', 'id' => $usuario->id], 'method' => 'put']) !!}

    <div class="table-responsive">

        <div class="col-6 offset-3 mt-5">
            <div>
                {!! Form::label('name', 'Nome') !!}
                {!! Form::text('name', $usuario->name, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="mt-2">
                {!! Form::label('telefone', 'Telefone') !!}
                {!! Form::text('telefone', $usuario->telefone, ['class' => 'form-control']) !!}
            </div>


            <div class="col-12 offset-3 mt-3 text-center" style="float: right;">
                {!! Form::submit('Salvar', ['class' => 'btn btn-dark']) !!}
                <a href="{{ URL::previous() }}" class="btn btn-dark">Cancelar</a>
            </div>
        </div>
    </div>

    {!! Form::open() !!}
@stop

@section('table-delete')
    "usuarios"
@endsection

<script>
    $(document).ready(function($) {
        $('#telefone').mask('(00) 00000-0000');
    });
</script>
