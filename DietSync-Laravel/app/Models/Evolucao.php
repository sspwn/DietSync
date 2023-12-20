<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Evolucao extends Model
{
    public function store(Request $request)
    {
        $evolucao = new Evolucao;
        $evolucao->data = $request->input('data');
        $evolucao->peso = $request->input('peso');
        $evolucao->altura = $request->input('altura');
        $evolucao->cintura = $request->input('cintura');
        $evolucao->save();

        return redirect()->back()->with('success', 'Medição registrada com sucesso!');
    }
}
