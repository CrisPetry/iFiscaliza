<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoUsuarios = TipoUsuario::all();

        return view('tipoUsuario.index', ['tipoUsuarios' => $tipoUsuarios]);
    }
}
