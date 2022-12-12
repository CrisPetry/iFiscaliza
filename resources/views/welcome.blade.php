<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css" />
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
</head>

<body>

    <nav class="navbar fixed-top bg-dark py-1" style="margin-top: -15px">
        <a class="navbar-brand pt-3" href="#">
            <img src="{{ asset('img/iFiscaliza.png') }}" width="50" height="50" alt="">
        </a>
        <form class="form-inline pt-2">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="btn-sm btn-secondary" role="button">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-sm btn-secondary">Logar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-sm btn-secondary">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </form>
    </nav>


    <div class="tm-page-container mx-auto">
        <header class="tm-header text-center" style="margin-top:40px">
            <h1 class="tm-title text">iFiscaliza</h1>
            <p class="tm-primary-color"><i>Uma nova forma de mobilidade urbana</i></p>
        </header>

        <section class="tm-section">
            <div class="tm-content-container">
                <figure class="mb-0">
                    <img src="{{ asset('img/transito.jpg') }}" alt="Image" class="img-fluid tm-img" />
                </figure>

                <div class="tm-content">
                    <h2 class="tm-page-title">Aqui você é o fiscal de trânsito!</h2>
                    <p class="mb-4">
                        Seja bem-vindo ao serviço iFiscaliza! É um prazer recebê-lo aqui.
                        A ideia desse projeto é muito significativa para nós, pois sempre buscamos alternativas para
                        aprimorar o funcionamento e a pacificidade no trânsito brasileiro.
                    </p>

                    <p>
                        É com muito orgulho que apresentamos esse sistema finalizado, onde você, condutor, pode
                        preencher um formulário de denúncia de trânsito, assim como pode também gerar relatórios com as
                        suas respectivas denúncias. Para começar a utilizá-lo é muito simples! Caso ainda não tenha um
                        login, bata cadastrar-se no site, para assim poder fazer a sua primeira denúncia.
                    </p>

                    <p>
                        E como funciona esse formulário de denúncia? Caso você verifique que algum condutor estacionou o
                        carro em local proibido, ou tem algum veículo parado em local indevido com o pisca alerta ligado
                        (dentre inúmeros outros tipos de infrações), basta tirar uma foto para posteriormente anexá-la
                        junto do formulário! Não se esqueça, o anexo dessa foto é obrigatório!
                    </p>
                </div>
            </div>
        </section>

        <footer>
            <span>Copyright 2022</span>
        </footer>
    </div>
</body>

</html>
