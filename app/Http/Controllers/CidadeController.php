<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    
    public function index()
    {
        $cidades = Cidade::all();

        return view('cidades.index', ['cidades' => $cidades]);
    }

   
    public function create()
    {
        return view('cidades.create');
    }

    
    public function store(Request $request)
    {
        $data = [
            'descricao' => $request['descricao'],
        ];

        Cidade::create($data);


        return redirect('cidades');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        return view('cidades.edit', compact('cidades'));
    }

    
    public function update(Request $request, $id)
    {
        $data = [
            'descricao' => $request['descricao']
        ];

        Cidade::find($id)->update($data);

        return redirect('cidades');
    }

    
    public function destroy($id)
    {
        //
    }
}
