<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BairroController extends Controller
{

    public function index(Request $filtro)
    {
        $filtragem = $filtro->get('desc_filtro');
        if ($filtragem == null)
            $bairros = Bairro::orderBy('id')->paginate(5);
        else
            $bairros = Bairro::where('descricao', 'like', '%' . $filtragem . '%')
                ->orderBy("descricao")
                ->paginate(5)
                ->setpath('bairros?desc_filtro=' . $filtragem);
        return view('bairros.index', ['bairros' => $bairros]);
    }


    public function create()
    {
        return view('bairros.create');
    }


    public function store(Request $request)
    {
        $bairros = $request->all();
        Bairro::create($bairros);
        return redirect()->route('bairros');
    }




    public function edit(Request $request)
    {
        $bairros = Bairro::find(Crypt::decrypt($request->get('id')));
        return view('bairros.edit', compact('bairros'));
    }


    public function update(Request $request, $id)
    {
        Bairro::find($id)->update($request->all());
        return redirect()->route('bairros');
    }

    public function destroy($id)
    {
        try {
            Bairro::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "Excluído com sucesso!");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function byCidade($cidade_id)
    {
        $bairros = Bairro::where('cidade_id', $cidade_id)->get();
        return $bairros;
    }

}
