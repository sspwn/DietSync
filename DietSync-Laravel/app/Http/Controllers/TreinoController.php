<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treino;

class TreinoController extends Controller
{
    public function registrarTreino(Request $request)
    {
        $treino = new Treino;
        $treino->data = $request->input('data');
        $treino->tipo = $request->input('tipo');
        
        // Converte a string de exercícios em um array
        $exercicios = explode(',', $request->input('exercicios'));
        $treino->exercicios = json_encode($exercicios);
    
        $treino->repeticoes = $request->input('repeticoes');
        $treino->series = $request->input('series');
        $treino->objetivo = $request->input('objetivo');
        $treino->duracao = $request->input('duracao');
        $treino->frequencia = $request->input('frequencia');
        $treino->nome_treino = $request->input('nome_treino');
        $treino->save();    

        return redirect()->route('registrar-treino');
    }


    public function index()
    {
        $treinos = Treino::all();

        return view('treinos', compact('treinos'));
    }

    public function show($id)
    {
        $treino = Treino::find($id);

        return view('pagina_treino', compact('treino'));
    }
}
