<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::group(['prefix' => 'usuarios', 'where' => ['id' => '[0-9]+']], function () {
            Route::any('',                  ['as' => 'usuarios',            'uses' => '\App\Http\Controllers\UserController@index']);
            Route::get('create',            ['as' => 'usuarios.create',     'uses' => '\App\Http\Controllers\UserController@create']);
            Route::get('{id}/destroy',      ['as' => 'usuarios.destroy',    'uses' => '\App\Http\Controllers\UserController@destroy']);
            Route::get('edit',              ['as' => 'usuarios.edit',       'uses' => '\App\Http\Controllers\UserController@edit']);
            Route::put('{id}/update',       ['as' => 'usuarios.update',     'uses' => '\App\Http\Controllers\UserController@update']);
            Route::post('store',            ['as' => 'usuarios.store',      'uses' => '\App\Http\Controllers\UserController@store']);
        });

        Route::group(['prefix' => 'tipoUsuarios', 'where' => ['id' => '[0-9]+']], function () {
            Route::get('',                  ['as' => 'tipoUsuarios',            'uses' => '\App\Http\Controllers\TipoUsuarioController@index']);
            Route::get('create',            ['as' => 'tipoUsuarios.create',     'uses' => '\App\Http\Controllers\TipoUsuarioController@create']);
            Route::get('{id}/destroy',      ['as' => 'tipoUsuarios.destroy',    'uses' => '\App\Http\Controllers\TipoUsuarioController@destroy']);
            Route::get('edit',              ['as' => 'tipoUsuarios.edit',       'uses' => '\App\Http\Controllers\TipoUsuarioController@edit']);
            Route::put('{id}/update',       ['as' => 'tipoUsuarios.update',     'uses' => '\App\Http\Controllers\TipoUsuarioController@update']);
            Route::post('store',            ['as' => 'tipoUsuarios.store',      'uses' => '\App\Http\Controllers\TipoUsuarioController@store']);
        });

        Route::group(['prefix' => 'cidades', 'where' => ['id' => '[0-9]+']], function () {
            Route::any('',                  ['as' => 'cidades',            'uses' => '\App\Http\Controllers\CidadeController@index']);
            Route::get('create',            ['as' => 'cidades.create',     'uses' => '\App\Http\Controllers\CidadeController@create']);
            Route::get('{id}/destroy',      ['as' => 'cidades.destroy',    'uses' => '\App\Http\Controllers\CidadeController@destroy']);
            Route::get('edit',              ['as' => 'cidades.edit',       'uses' => '\App\Http\Controllers\CidadeController@edit']);
            Route::put('{id}/update',       ['as' => 'cidades.update',     'uses' => '\App\Http\Controllers\CidadeController@update']);
            Route::post('store',            ['as' => 'cidades.store',      'uses' => '\App\Http\Controllers\CidadeController@store']);
            Route::get('{estado_id}',       ['as' => 'cidades.byEstado',   'uses' => '\App\Http\Controllers\CidadeController@byEstado']);
        });

        Route::group(['prefix' => 'estados', 'where' => ['id' => '[0-9]+']], function () {
            Route::any('',                  ['as' => 'estados',            'uses' => '\App\Http\Controllers\EstadoController@index']);
            Route::get('create',            ['as' => 'estados.create',     'uses' => '\App\Http\Controllers\EstadoController@create']);
            Route::get('{id}/destroy',      ['as' => 'estados.destroy',    'uses' => '\App\Http\Controllers\EstadoController@destroy']);
            Route::get('edit',              ['as' => 'estados.edit',       'uses' => '\App\Http\Controllers\EstadoController@edit']);
            Route::put('{id}/update',       ['as' => 'estados.update',     'uses' => '\App\Http\Controllers\EstadoController@update']);
            Route::post('store',            ['as' => 'estados.store',      'uses' => '\App\Http\Controllers\EstadoController@store']);
        });

        Route::group(['prefix' => 'infracoes', 'where' => ['id' => '[0-9]+']], function () {
            Route::any('',                  ['as' => 'infracoes',            'uses' => '\App\Http\Controllers\InfracaoController@index']);
            Route::get('create',            ['as' => 'infracoes.create',     'uses' => '\App\Http\Controllers\InfracaoController@create']);
            Route::get('{id}/destroy',      ['as' => 'infracoes.destroy',    'uses' => '\App\Http\Controllers\InfracaoController@destroy']);
            Route::get('edit',              ['as' => 'infracoes.edit',       'uses' => '\App\Http\Controllers\InfracaoController@edit']);
            Route::put('{id}/update',       ['as' => 'infracoes.update',     'uses' => '\App\Http\Controllers\InfracaoController@update']);
            Route::post('store',            ['as' => 'infracoes.store',      'uses' => '\App\Http\Controllers\InfracaoController@store']);
        });

        Route::group(['prefix' => 'denuncias', 'where' => ['id' => '[0-9]+']], function () {
            Route::any('',                  ['as' => 'denuncias',            'uses' => '\App\Http\Controllers\DenunciaController@index']);
            Route::get('create',            ['as' => 'denuncias.create',     'uses' => '\App\Http\Controllers\DenunciaController@create']);
            Route::get('{id}/destroy',      ['as' => 'denuncias.destroy',    'uses' => '\App\Http\Controllers\DenunciaController@destroy']);
            Route::get('edit',              ['as' => 'denuncias.edit',       'uses' => '\App\Http\Controllers\DenunciaController@edit']);
            Route::put('{id}/update',       ['as' => 'denuncias.update',     'uses' => '\App\Http\Controllers\DenunciaController@update']);
            Route::post('store',            ['as' => 'denuncias.store',      'uses' => '\App\Http\Controllers\DenunciaController@store']);
            Route::get('show/{id}',         ['as' => 'denuncias.show',       'uses' => '\App\Http\Controllers\DenunciaController@show']);
            Route::any('admin',             ['as' => 'denuncias.pdfAdmin',   'uses' => "\App\Http\Controllers\DenunciaController@pdfAdmin"]);
            Route::any('status',            ['as' => 'denuncias.status',     'uses' => "\App\Http\Controllers\DenunciaController@status"]);
            Route::get('send/{id}',         ['as' => 'denuncias.send',       'uses' => "\App\Http\Controllers\DenunciaController@send"]);
        });

        Route::group(['prefix' => 'bairros', 'where' => ['id' => '[0-9]+']], function () {
            Route::any('',                  ['as' => 'bairros',            'uses' => '\App\Http\Controllers\BairroController@index']);
            Route::get('create',            ['as' => 'bairros.create',     'uses' => '\App\Http\Controllers\BairroController@create']);
            Route::get('{id}/destroy',      ['as' => 'bairros.destroy',    'uses' => '\App\Http\Controllers\BairroController@destroy']);
            Route::get('edit',              ['as' => 'bairros.edit',       'uses' => '\App\Http\Controllers\BairroController@edit']);
            Route::put('{id}/update',       ['as' => 'bairros.update',     'uses' => '\App\Http\Controllers\BairroController@update']);
            Route::post('store',            ['as' => 'bairros.store',      'uses' => '\App\Http\Controllers\BairroController@store']);
            Route::get('{cidade_id}',       ['as' => 'bairros.byCidade',   'uses' => '\App\Http\Controllers\BairroController@byCidade']);
        });
    });

    Route::group(['prefix' => 'tipoUsuarios', 'where' => ['id' => '[0-9]+']], function () {
        Route::get('',                  ['as' => 'tipoUsuarios',            'uses' => '\App\Http\Controllers\TipoUsuarioController@index']);
        Route::get('create',            ['as' => 'tipoUsuarios.create',     'uses' => '\App\Http\Controllers\TipoUsuarioController@create']);
        Route::get('{id}/destroy',      ['as' => 'tipoUsuarios.destroy',    'uses' => '\App\Http\Controllers\TipoUsuarioController@destroy']);
        Route::get('edit',              ['as' => 'tipoUsuarios.edit',       'uses' => '\App\Http\Controllers\TipoUsuarioController@edit']);
        Route::put('{id}/update',       ['as' => 'tipoUsuarios.update',     'uses' => '\App\Http\Controllers\TipoUsuarioController@update']);
        Route::post('store',            ['as' => 'tipoUsuarios.store',      'uses' => '\App\Http\Controllers\TipoUsuarioController@store']);
    });

    Route::group(['prefix' => 'cidades', 'where' => ['id' => '[0-9]+']], function () {
        Route::get('{estado_id}',       ['as' => 'cidades.byEstado',   'uses' => '\App\Http\Controllers\CidadeController@byEstado']);
    });

    Route::group(['prefix' => 'bairros', 'where' => ['id' => '[0-9]+']], function () {
        Route::get('{cidade_id}',       ['as' => 'bairros.byCidade',   'uses' => '\App\Http\Controllers\BairroController@byCidade']);
    });

    Route::group(['prefix' => 'usuarios', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',                  ['as' => 'usuarios',            'uses' => '\App\Http\Controllers\UserController@index']);
        Route::get('edit',              ['as' => 'usuarios.edit',       'uses' => '\App\Http\Controllers\UserController@edit']);
        Route::put('{id}/update',       ['as' => 'usuarios.update',     'uses' => '\App\Http\Controllers\UserController@update']);
    });

    Route::group(['prefix' => 'denuncias', 'where' => ['id' => '[0-9]+']], function () {
        Route::any('',                  ['as' => 'denuncias',            'uses' => '\App\Http\Controllers\DenunciaController@index']);
        Route::get('create',            ['as' => 'denuncias.create',     'uses' => '\App\Http\Controllers\DenunciaController@create']);
        Route::get('{id}/destroy',      ['as' => 'denuncias.destroy',    'uses' => '\App\Http\Controllers\DenunciaController@destroy']);
        Route::get('edit',              ['as' => 'denuncias.edit',       'uses' => '\App\Http\Controllers\DenunciaController@edit']);
        Route::put('{id}/update',       ['as' => 'denuncias.update',     'uses' => '\App\Http\Controllers\DenunciaController@update']);
        Route::post('store',            ['as' => 'denuncias.store',      'uses' => '\App\Http\Controllers\DenunciaController@store']);
        Route::get('show/{id}',         ['as' => 'denuncias.show',       'uses' => '\App\Http\Controllers\DenunciaController@show']);
        Route::any('denunciante',       ['as' => 'denuncias.pdf',        'uses' => "\App\Http\Controllers\DenunciaController@pdf"]);
    });
});
