<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {

        $usuarios = User::all();

        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'cpf' => $request['cpf'],
            'telefone' => $request['telefone'],
            'tipo_usuario_id' => $request['tipo_usuario_id']
        ];

        User::create($data);


        return redirect('usuarios');
    }

    public function edit($id)
    {
        $id = Auth::id();
        $usuario = User::find($id);
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
            'telefone' => $request['telefone']
        ];

        User::find($id)->update($data);

        return redirect('usuarios');
    }
}
