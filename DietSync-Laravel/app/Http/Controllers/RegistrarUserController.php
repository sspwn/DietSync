<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrarUserController extends Controller
{
    public function RegistroUsuario(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->meta = $request->input('meta');
        $user->sexo = $request->input('sexo');
        $user->data_nasc = $request->input('data_nasc');
        $user->peso = $request->input('peso');
        $user->altura = $request->input('altura');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();
        return redirect('/');
    }
}
