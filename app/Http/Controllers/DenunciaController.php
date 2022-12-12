<?php

namespace App\Http\Controllers;

use App\Mail\iFiscalizaEmail;
use App\Mail\SendMail;
use App\Models\Denuncia;
use App\Models\Estado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;



class DenunciaController extends Controller
{

    public function index(Request $filtro)
    {
        $estados = Estado::all();
        $parametro = $filtro->get('status_id');
        if (Auth::user()->tipo_usuario_id == 1) {
            if ($parametro == null) {
                $denuncias = Denuncia::orderBy('id')->paginate(5);
            } else {
                $denuncias = Denuncia::select('denuncias.*')
                    ->join('status', 'status.id', '=', 'denuncias.status_id')
                    ->where('status.id', '=',  $parametro)
                    ->orderBy('id')
                    ->paginate(5);
            }
        } else {
            $denuncias = Denuncia::where('users_id', '=', Auth::user()->id)->orderBy('id')->paginate(5);
        }
        return view('denuncias.index', ['denuncias' => $denuncias], ['estados' => $estados]);
    }





    public function create()
    {
        $estados = Estado::all();
        return view('denuncias.create', ['estados' => $estados]);
    }


    public function send($id)
    {
        $denuncias = Denuncia::select('denuncias.*')
            ->join('users', 'users.id', '=', 'denuncias.users_id')
            ->where('denuncias.id', '=',  $id)->first();


        // return view('denuncias.send', ['denuncias' => $denuncias]);
        Mail::to($denuncias->user->email)->send(new iFiscalizaEmail($denuncias));
        return redirect()->route('denuncias');
    }


    public function store(Request $request)
    {

        $denuncias = $request->all();

        if ($request->hasFile('path')) {
            $dest = '/public/images/denuncias/';
            $image = $request->file('path');
            $extension = $image->extension();

            $image_name = md5($image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $path = $request->file('path')->storeAs($dest, $image_name);
            $denuncias['path'] = $dest . $image_name;
        }

        $denuncias['users_id'] = Auth::user()->id;
        Denuncia::create($denuncias);
        return redirect()->route('denuncias');
    }


    public function edit(Request $request)
    {
        $denuncias = Denuncia::find(Crypt::decrypt($request->get('id')));
        return view('denuncias.edit', compact('denuncias'));
    }


    public function update(Request $request, $id)
    {
        Denuncia::find($id)->update($request->all());
        return redirect()->route('denuncias');
    }


    public function destroy($id)
    {
        try {
            Denuncia::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "Excluído com sucesso!");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function show($id)
    {
        return view('denuncias.show', ['denuncias' => Denuncia::findOrFail($id)]);
    }


    public function pdfAdmin(Request $request)
    {

        $infracao = $request->get('infracao_id');
        $status = $request->get('status_id');
        $bairro = $request->get('bairro_id');
        $denuncias = null;

        if ($bairro != null) {
            $denuncias = Denuncia::select('denuncias.*')
                ->join('bairros', 'bairros.id', '=', 'denuncias.bairro_id')
                ->Where('bairros.id', '=', $bairro)
                ->get();
        } else if ($infracao != null) {
            $denuncias = Denuncia::select('denuncias.*')
                ->join('infracoes', 'infracoes.id', '=', 'denuncias.infracao_id')
                ->Where('infracoes.id', '=', $infracao)
                ->get();
        } else if ($status != null) {
            $denuncias = Denuncia::select('denuncias.*')
                ->join('status', 'status.id', '=', 'denuncias.status_id')
                ->Where('status.id', '=', $status)
                ->get();
        } else {
            $denuncias = Denuncia::all();
        }

        $pdf = PDF::loadView('denuncias.pdfAdmin', compact('denuncias'));
        return $pdf->setPaper('a4', 'landscape')->stream('todas_as_denuncias.pdf');
    }



    public function pdf(Request $filtro)
    {

        $denuncias = Denuncia::select('denuncias.*')
            ->join('users', 'users.id', '=', 'denuncias.users_id')
            ->where('users.id', '=',  Auth::user()->id)
            ->get();

        $pdf = PDF::loadView('denuncias.pdf', compact('denuncias'));
        return $pdf->setPaper('a4', 'landscape')->stream('denuncias_por_id.pdf');
    }
}
