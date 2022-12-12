<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfracaoRequest;
use App\Models\Infracao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class InfracaoController extends Controller
{

    public function index(Request $filtro)
    {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $infracoes = Infracao::orderBy('id')->paginate(5);
        else
            $infracoes = Infracao::where('descricao', 'like', '%' . $filtragem . '%')
                ->orderBy("descricao")
                ->paginate(5)
                ->setpath('infracoes?desc_filtro=' . $filtragem);
        return view('infracoes.index', ['infracoes' => $infracoes]);
    }


    public function create()
    {
        return view('infracoes.create');
    }


    public function store(InfracaoRequest $request)
    {
        try {
            $infracoes = $request->all();
            Infracao::create($infracoes);
            return redirect()->route('infracoes');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('infracoes.create', ['descricao' => $request->descricao])
                ->withErrors(['error' => 'Infração já cadastrada.']);
        } catch (\PDOException $e) {
            return redirect()->route('infracoes.create', ['descricao' => $request->descricao])
                ->withErrors(['error' => 'Infração já cadastrada.']);
        }
    }


    public function edit(Request $request)
    {
        $infracoes = Infracao::find(Crypt::decrypt($request->get('id')));
        return view('infracoes.edit', compact('infracoes'));
    }


    public function update(Request $request, $id)
    {
        Infracao::find($id)->update($request->all());
        return redirect()->route('infracoes');
    }


    public function destroy($id)
    {
        try {
            Infracao::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "Excluído com sucesso!");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
