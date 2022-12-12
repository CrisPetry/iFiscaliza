<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\HasApiTokens;






class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::where('id', '=', Auth::user()->id)->paginate(5);
        return view('usuario.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {

        $tipo = 2;

        User::create([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'cpf' => $request['cpf'],
            'telefone' => $request['telefone'],
            'tipo_usuario_id' => $tipo
        ]);

        return redirect('usuarios');
    }

    public function edit(Request $request)
    {
        $usuario = User::find(Crypt::decrypt($request->get('id')));
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

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "Excluído com sucesso!");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
