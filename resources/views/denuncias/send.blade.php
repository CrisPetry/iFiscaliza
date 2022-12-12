@component('mail::message')
    <h1>Atualização de Status de Denúncia</h1>

    Olá {{ $denuncia->user->name }}!

    Sua denúncia realizada no dia {{ Carbon\Carbon::parse($denuncia->data)->format('d/m/Y') }} teve seu status alterado,
    confira:

    ID: {{ $denuncia->id }}

    Descrição: {{ $denuncia->descricao }}

    Local: {{ $denuncia->pontoReferencia }}

    Estado: {{ $denuncia->estado->sigla }}

    Cidade: {{ $denuncia->cidade->descricao }}

    Status: {{ $denuncia->status->descricao }}
@endcomponent
