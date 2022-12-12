<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{

    public function index()
    {
        $tipoUsuarios = TipoUsuario::orderBy('descricao')->paginate(5);

        return view('tipoUsuario.index', ['tipoUsuarios' => $tipoUsuarios]);
    }

    public function create()
    {
        return view('tipoUsuario.create');
    }


    public function store(Request $request)
    {
        $tipoUsuarios = $request->all();
        TipoUsuario::create($tipoUsuarios);
        return redirect()->route('tipoUsuarios');
    }


    public function edit($id)
    {
        $tipoUsuarios = TipoUsuario::find($id);
        return view('tipoUsuario.edit', compact('tipoUsuarios'));
    }

    public function update(Request $request, $id)
    {
        TipoUsuario::find($id)->update($request->all());
        return redirect()->route('tipoUsuarios');
    }


    public function destroy($id)
    {
        TipoUsuario::find($id)->delete();
        return redirect()->route('tipoUsuarios');
    }
}
