<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evolucao;

class EvolucaoController extends Controller
{
    public function store(Request $request)
    {
        $evolucao = new Evolucao;
        $evolucao->data = $request->input('data');
        $evolucao->peso = $request->input('peso');
        $evolucao->altura = $request->input('altura');
        $evolucao->cintura = $request->input('cintura');
        $evolucao->save();

        return redirect('evolucao')->with('success', 'Medição registrada com sucesso!');
    }

    public function index()
    {
        $evolucoes = Evolucao::all();
        return view('evolucao', ['evolucoes' => $evolucoes]);
    }
}
