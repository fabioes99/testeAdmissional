<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chamado;
use App\Models\ChamadoResposta;
use Illuminate\Support\Carbon;


class ChamadoController extends Controller
{

    public function create()
    {
        // Verifica se o usu�rio atual � do tipo "Cliente"
        $user = Auth::user();
        if ($user->role === 'Cliente') {
            return view('criar-chamado');
        } else {
            return redirect()->route('dashboard')->with('error', 'Somente clientes podem abrir chamados.');
        }
    }

    public function store(Request $request)
    {

        // Valide os dados do formul�rio
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $chamado = new Chamado;

        $chamado->title = $request->title;
        $chamado->description = $request->description;
        $chamado->status = 'Aberto';

         // Image Upload
         if($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

            $requestImage = $request->attachment;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('storage'), $imageName);

            $chamado->attachment = $imageName;

        }

        $user = Auth::user();

        $user->chamados()->save($chamado);

        return redirect()->route('dashboard')->with('success', 'Chamado aberto com sucesso.');
    }

    public function show() {

        $user = Auth::user();

        if ($user->role === 'Cliente') {
            $chamados = Chamado::where('user_id','=',$user->id)->get()->toArray();

            return view('dashboard', ['chamados' => $chamados ]);
        } else {
            $chamados = Chamado::all();

            return view('dashboard', ['chamados' => $chamados ]);
        }

    }

    public function response($id) {

        $chamado = Chamado::findOrFail($id);

        $respostas = ChamadoResposta::where('chamado_id','=',$id)->get()->toArray();

        foreach ($respostas as $key => $resposta) {
            $respostas[$key]['created_at'] = Carbon::parse($resposta['created_at'])->format('d/m/Y H:i:s');
        }

        if($chamado){
            return view('response', ['dadosChamado' => $chamado->getAttributes(), 'respostas' => $respostas]);
        }

    }

    public function insertResponse(Request $request, $id_chamado) {
        $user = Auth::user();

        // Valide os dados do formul�rio
        $validatedData = $request->validate([
            'response' => 'required|string',
        ]);

        $ChamadoResposta = new ChamadoResposta([
            'chamado_id' => $id_chamado,
            'response' => $validatedData['response'],
        ]);

        $user = Auth::user();
        $user->chamadoResposta()->save($ChamadoResposta);

        return redirect()->route('dashboard')->with('success', 'Chamado respondido com sucesso.');
    }


    public function finalizar($id)
    {
        $chamado = Chamado::findOrFail($id);

        $chamado->status = 'finalizado';
        $chamado->save();

        return redirect()->route('dashboard')->with('success', 'Chamado finalizado com sucesso.');
    }



}
