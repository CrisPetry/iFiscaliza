@extends('adminlte::page')

@section('content')

    <div class="container pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/infracoes">Infrações</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastrar Infração</li>
            </ol>
        </nav>
    </div>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="container">
        {!! Form::open(['route' => 'infracoes.store']) !!}
        <div class="table-responsive">
            <div class="container-fluid">
                <div>
                    <form>
                        <div class="col-6 offset-3 mt-5">

                            <div>
                                {!! Form::label('descricao', 'Descrição') !!}
                                {!! Form::text('descricao', null, ['class' => 'form-control', 'required']) !!}
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
    </div>

    {!! Form::open() !!}
@stop
