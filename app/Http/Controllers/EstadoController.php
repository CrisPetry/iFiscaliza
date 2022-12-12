<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadoRequest;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EstadoController extends Controller
{

    public function index()
    {
        $estados = Estado::orderBy('descricao')->paginate(5);
        return view('estados.index', ['estados' => $estados]);
    }


    public function create()
    {
        return view('estados.create');
    }


    public function store(EstadoRequest $request)
    {
        try {
            $estados = $request->all();
            Estado::create($estados);
            return redirect()->route('estados');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('estados.create', ['sigla' => $request->sigla, 'descricao' => $request->descricao])
                ->withErrors(['error' => 'Estado já cadastrado.']);
        } catch (\PDOException $e) {
            return redirect()->route('estados.create', ['sigla' => $request->sigla, 'descricao' => $request->descricao])
                ->withErrors(['error' => 'Estado já cadastrado.']);
        }
    }


    public function edit(Request $request)
    {
        $estados = Estado::find(Crypt::decrypt($request->get('id')));
        return view('estados.edit', compact('estados'));
    }


    public function update(Request $request, $id)
    {
        Estado::find($id)->update($request->all());
        return redirect()->route('estados');
    }


    public function destroy($id)
    {
        try {
            Estado::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "Excluído com sucesso!");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
