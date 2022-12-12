<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CidadeController extends Controller
{
    public function index(Request $filtro)
    {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $cidades = Cidade::orderBy('id')->paginate(5);
        else
            $cidades = Cidade::where('descricao', 'like', '%' . $filtragem . '%')
                ->orderBy("descricao")
                ->paginate(5)
                ->setpath('cidades?desc_filtro=' . $filtragem);
        return view('cidades.index', ['cidades' => $cidades]);
    }


    public function create()
    {
        return view('cidades.create');
    }


    public function store(Request $request)
    {
        $cidade = $request->all();
        Cidade::create($cidade);
        return redirect()->route('cidades');
    }


    public function edit(Request $request)
    {
        $cidades = Cidade::find(Crypt::decrypt($request->get('id')));
        return view('cidades.edit', compact('cidades'));
    }


    public function update(Request $request, $id)
    {
        Cidade::find($id)->update($request->all());
        return redirect()->route('cidades');
    }


    public function destroy($id)
    {
        try {
            Cidade::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "Excluído com sucesso!");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function byEstado($estado_id)
    {
        $cidades = Cidade::where('estado_id', $estado_id)->get();
        return $cidades;
    }
}
