@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="row">

                            <div class="col-sm-6 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Usuários</h5>
                                        <p class="card-text">Cadastro de usuários autorizados com acesso
                                            ao sistema.</p>
                                        <a href="http://127.0.0.1:8000/usuarios" class="btn btn-dark">Acessar</a>
                                    </div>
                                </div>
                            </div>


                            @can('admin')
                                <div class="col-sm-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Tipos de Usuário</h5>
                                            <p class="card-text">Tipos de usuário que possuem acesso ao sistema.</p>
                                            <a href="http://127.0.0.1:8000/tipoUsuarios" class="btn btn-dark">Acessar</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Cidades</h5>
                                            <p class="card-text">Cadastro de cidades aptas a receberem denúncias.</p>
                                            <a href="http://127.0.0.1:8000/cidades" class="btn btn-dark">Acessar</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Estados</h5>
                                            <p class="card-text">Cadastro de estados aptos a receberem denúncias.</p>
                                            <a href="http://127.0.0.1:8000/estados" class="btn btn-dark">Acessar</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 mt-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Infrações</h5>
                                            <p class="card-text">Cadastro dos tipos de infrações que podem ser utilizadas nas
                                                denúncias.</p>
                                            <a href="http://127.0.0.1:8000/infracoes" class="btn btn-dark">Acessar</a>
                                        </div>
                                    </div>
                                </div>
                            @endcan

                            <div class="col-sm-6 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Denúncias</h5>
                                        <p class="card-text">Cadastro de denúncias presenciadas pelos usuários.</p>
                                        <a href="http://127.0.0.1:8000/denuncias" class="btn btn-dark">Acessar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
