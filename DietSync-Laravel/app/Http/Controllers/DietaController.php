<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dieta;

class DietaController extends Controller
{
    public function registrarDieta(Request $request)
    {
        $dieta = new Dieta();
        $dieta->nome_dieta = $request->input('nome_dieta');
        $dieta->tipo_dieta = $request->input('tipo_dieta');
        $dieta->calorias = $request->input('calorias');
        $dieta->proteinas = $request->input('proteinas');
        $dieta->carboidratos = $request->input('carboidratos');
        $dieta->gorduras = $request->input('gorduras');
        $dieta->data_dieta = $request->input('data_dieta');
        $dieta->refeicao = $request->input('refeicao');

        // Transforma a string de alimentos em um array e converte para JSON
        $alimentos = explode(',', $request->input('alimentos'));
        $dieta->alimentos = json_encode($alimentos);

        $dieta->quantidade = $request->input('quantidade');
        $dieta->observacoes = $request->input('observacoes');

        $dieta->save();

        return redirect()->route('registrar-dieta')->with('success', 'Dieta cadastrada com sucesso!');
    }

    public function exibirDieta()
    {
        // Supondo que você queira obter todas as dietas (você pode ajustar conforme necessário)
        $dietas = Dieta::all();
    
        return view('dieta', compact('dietas'));
    }
}
