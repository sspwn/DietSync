<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;

class ReceitaController extends Controller
{
    public function registrarReceita(Request $request)
    {
        $data = $request->validate([
            'nome_receita' => 'required',
            'ingredientes' => 'required',
            'modo_preparo' => 'required',
            'calorias' => 'required|numeric',
            'proteinas' => 'required|numeric',
            'carboidratos' => 'required|numeric',
            'gordura' => 'required|numeric',
        ]);

        Receita::create($data);

        return redirect()->back()->with('success', 'Receita registrada com sucesso!');
    }

    public function index()
    {
        $receitas = Receita::all();

        return view('receitas', compact('receitas'));
    }

    public function show($id)
    {
        $receita = Receita::find($id);

        return view('pagina_receita', compact('receita'));
    }
}
