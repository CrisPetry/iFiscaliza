@extends('layouts.default')

@section('content')


    {{-- BREADCRUMBS COM OS ITENS DE NAVEGAÇÃO --}}
    <div class="container-fluid pt-3">
        <nav aria-label="Page breadcrumb">
            <ol class="breadcrumb" style="padding-top: 10px; padding-bottom:10px;">
                <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Denúncias</li>
                <div class="col-10 text-right">

                    @can('denunciante')
                        <a href="{{ route('denuncias.create', []) }}" class="btn btn-sm btn-dark">
                            Adicionar&nbsp;&nbsp;<i class="fa fa-plus"></i></a>

                        <a href="{{ route('denuncias.pdf', []) }}" class="btn btn-sm btn-dark" target="_blank">
                            Relatório&nbsp;&nbsp;<i class="fa fa-print"></i></a>
                    @endcan

                    @can('admin')
                        @foreach ($denuncias as $denuncia)
                            <div class="btn-group dropleft">
                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="height:35px; padding-top:3px;">
                                    Relatório&nbsp;&nbsp;<i class="fa fa-print"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" data-target="#filtroCidade"
                                        data-toggle="modal">Filtro
                                        por Bairro</button>
                                    <button class="dropdown-item" type="button" data-target="#filtroInfracao"
                                        data-toggle="modal">Filtro
                                        por Infração</button>
                                    <button class="dropdown-item" type="button" data-target="#filtroStatus"
                                        data-toggle="modal">Filtro
                                        por Status</button>
                                </div>
                            </div>
                        @endforeach
                    @endcan
                </div>
            </ol>
        </nav>
    </div>

    @can('admin')
        {{-- FILTRO NA LISTAGEM DO INDEX --}}
        {!! Form::open(['name' => 'form_name', 'route' => 'denuncias']) !!}
        <div class="sidebar-form">
            <div class="input-group">
                <div class="col-md-3 d-inline-flex">
                    {!! Form::select(
                        'status_id',
                        \App\Models\Status::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                        'Todas',
                        ['class' => 'form-control', 'placeholder' => 'Todas'],
                    ) !!}
                </div>
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-sm btn-dark" style="margin-top:3px;">
                        <i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
        {!! Form::close() !!}
        <br>
    @endcan

    {{-- MODAL FILTRO POR CIDADE --}}
    <div class="modal fade" id="filtroCidade" tabindex="-1" role="dialog" aria-labelledby="filtroCidade"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {!! Form::open(['name' => 'form_name', 'route' => 'denuncias.pdfAdmin']) !!}
                    <div class="sidebar-form">
                        <div class="offset-1 col-md-10 mb-5 mt-3">
                            <label for="estado_id">Estado</label>
                            <select class="form-control" name="estado_id" id="estado_id">
                                <option value="">Selecione</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->descricao }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="offset-1 col-md-10 mb-5">
                            <label for="">Cidade</label>
                            <select class="form-control" name="cidade_id" id="cidade_id">
                                <option value="">Selecione</option>
                            </select>
                        </div>

                        <div class="offset-1 col-md-10 mb-5">
                            <label for="bairro_id">Bairro</label>
                            <select class="form-control" name="bairro_id" id="bairro_id">
                                <option value="">Selecione</option>
                            </select>
                        </div>

                        <div class="col-md-12 text-center offset-4">
                            <button class="btn-sm btn-dark" onclick="$('select').val('').selectpicker('refresh')"
                                data-dismiss="modal">Fechar</button>
                            <button type="submit" formtarget="_blank" name="search" id="search-btn"
                                class="btn-sm btn-dark ml-1">Gerar</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL FILTRO POR INFRAÇÃO --}}
    <div class="modal fade" id="filtroInfracao" tabindex="-1" role="dialog" aria-labelledby="filtroInfracao"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {!! Form::open(['name' => 'form_name', 'route' => 'denuncias.pdfAdmin']) !!}
                    <div class="offset-1 col-md-10 mb-5">
                        {!! Form::label('infracao_id', 'Infração') !!}
                        {!! Form::select(
                            'infracao_id',
                            \App\Models\Infracao::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                            'Selecione',
                            ['class' => 'form-control', 'placeholder' => 'Selecione'],
                        ) !!}
                    </div>

                    <div class="col-md-12 text-center offset-4">
                        <button class="btn-sm btn-dark" onclick="$('select').val('').selectpicker('refresh')"
                            data-dismiss="modal">Fechar</button>
                        <button type="submit" formtarget="_blank" name="search" id="search-btn"
                            class="btn-sm btn-dark ml-1">Gerar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL FILTRO POR STATUS --}}
    <div class="modal fade" id="filtroStatus" tabindex="-1" role="dialog" aria-labelledby="filtroStatus"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {!! Form::open(['name' => 'form_name', 'route' => 'denuncias.pdfAdmin']) !!}
                    <div class="offset-1 col-md-10 mb-5">
                        {!! Form::label('status_id', 'Status') !!}
                        {!! Form::select(
                            'status_id',
                            \App\Models\Status::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                            'Selecione',
                            ['class' => 'form-control', 'placeholder' => 'Selecione'],
                        ) !!}
                    </div>

                    <div class="col-md-12 text-center offset-4">
                        <button class="btn-sm btn-dark" onclick="$('select').val('').selectpicker('refresh')"
                            data-dismiss="modal">Fechar</button>
                        <button type="submit" formtarget="_blank" name="search" id="search-btn"
                            class="btn-sm btn-dark ml-1">Gerar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-responsive-md">
                <thead style="text-align: center">
                    <th>ID</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Ponto de Referência</th>
                    <th>Ações</th>
                </thead>

                <tbody>
                    @foreach ($denuncias as $denuncia)
                        <tr style="text-align: center">
                            <td>{{ $denuncia->id }}</td>
                            <td>{{ Carbon\Carbon::parse($denuncia->data)->format('d/m/Y') }}</td>
                            <td>{{ $denuncia->descricao }}</td>
                            <td>{{ $denuncia->pontoReferencia }}</td>
                            </td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('denuncias.show', ['id' => $denuncia->id]) }}"
                                        class="btn-sm btn-dark mr-1">
                                        <i class="fa fa-eye"></i></a>
                                    @can('admin')
                                        <a href="{{ route('denuncias.edit', ['id' => \Crypt::encrypt($denuncia->id)]) }}"
                                            class="btn-sm btn-dark">
                                            <i class="fa fa-edit"></i></a>

                                        @if ($denuncia->status_id != null)
                                            <a href="{{ route('denuncias.send', ['id' => $denuncia->id]) }}"
                                                class="btn-sm btn-dark ml-1">
                                                <i class="fa fa-envelope"></i></a>
                                        @endif
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $denuncias->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop



@section('table-delete')
    "denuncias"
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    {{-- SCRIPT PARA AO SELECIONAR O ESTADO, POPULAR O DROPDOWNLIST DA CIDADE --}}
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
