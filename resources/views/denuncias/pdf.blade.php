<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<style>
    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        vertical-align: middle;
    }

   td{
    border-bottom: 1px solid black;
   }
</style>



<body>

    <div class="table-responsive">
        <table class="table text-center">

            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Data</th>
                    <th scope="col">Infração</th>
                    <th scope="col">UF</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Foto da ocorrência</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($denuncias as $denuncia)
                    <tr class="table-active">
                        <td>{{ $denuncia->id }}</td>
                        <td>{{ Carbon\Carbon::parse($denuncia->data)->format('d/m/Y') }}</td>
                        <td>{{ $denuncia->infracao->descricao }}</td>
                        <td>{{ $denuncia->estado->sigla }}</td>
                        <td>{{ $denuncia->cidade->descricao }}</td>
                        <td>
                            <div class="img img-responsive">
                                <img src="{{ public_path(str_replace('public', 'storage', $denuncia->path)) }}"
                                    alt="" width="200" class="img-fluid img-thumbnail">
                            </div>
                        </td>
                        <hr>
                    </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</body>

</html>
