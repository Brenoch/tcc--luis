<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function login_ajax(Request $r)
    {
        $r->validate(['password' => 'required', 'email' => 'required|email'], [], ['password' => 'senha']);

        $usuarios = ModelsUser::where("email", $r->email)->get();
        dd($r->all(), $usuarios);
    }

    public function cadastro_ajax(Request $r)
    {
        // Faz a validação dos dados
        $r->validate(['name' => 'required', 'password' => 'required', 'email' => 'required|email'], [], ['password' => 'senha', 'name' => 'nome']);

        // Define os dados separadamente(normalmente não precisa, mas no caso precisa fazer o hash da senha antes)
        $dados = $r->all();
        // Faz o hash da senha
        $dados['password'] = Hash::make($dados['password']);

        // Cria o usuario
        $usuario = ModelsUser::create($dados);

        // Faz o login do usuario criado
        Auth::login($usuario);

        // Esvazia a sessão
        session()->flush();
        // Define o usuario na sessão para usar dentro do sistema caso necessário
        session()->put('usuario', $usuario);
        // Inicia a sessão do usuario
        session()->regenerate();

        return response()->json(['resultado' => true, 'mensagem' => 'Usuario cadastrado com sucesso']);
    }
}
