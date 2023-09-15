<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chamado;
use App\Models\ChamadoResposta;

class ChamadoController extends Controller
{

    public function create()
    {
        // Verifica se o usuário atual é do tipo "Cliente"
        $user = Auth::user();
        if ($user->role === 'Cliente') {
            return view('criar-chamado');
        } else {
            return redirect()->route('dashboard')->with('error', 'Somente clientes podem abrir chamados.');
        } 
    }

    public function store(Request $request)
    {
        // Valide os dados do formulário
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Crie um novo chamado associado ao usuário atual
        $chamado = new Chamado([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'attachment' => $request->attachment,
            'status' => 'Aberto',
        ]);
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

        if($chamado){
            return view('response', ['dadosChamado' => $chamado->getAttributes(), 'respostas' => $respostas]);
        }
      
    }

    public function insertResponse(Request $request) {

        $user = Auth::user();

       // Valide os dados do formulário
       $validatedData = $request->validate([
        'response' => 'required|string', 
        ]);
        
        $ChamadoResposta = new ChamadoResposta([
            'chamado_id' => 1,
            'response' => $validatedData['response'],
        ]);

        $user = Auth::user();
        $user->chamadoResposta()->save($ChamadoResposta);

        return redirect()->route('dashboard')->with('success', 'Chamado respondido com sucesso.');
      
    }


}
