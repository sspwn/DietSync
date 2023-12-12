<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrarUserController extends Controller
{
    public function RegistroUsuario(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'meta' => 'required|string|max:255',
            'nome_usuario' => 'required|string|max:255|unique:users',
            'data_nasc' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'peso' => 'required|string|max:255',
            'altura' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'meta' => $request->meta,
            'nome_usuario' => $request->nome_usuario,
            'data_nasc' => $request->data_nasc,
            'sexo' => $request->sexo,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Se o usuário foi criado com sucesso, você pode redirecionar para a rota desejada
        if ($user) {
            return redirect()->route('login')->with('page', 'login');
        } else {
            // Lógica para tratamento de erro, se necessário
            return back()->withInput()->withErrors(['Erro ao registrar usuário']);
        }
    }
}
