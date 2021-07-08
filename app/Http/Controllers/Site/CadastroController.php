<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro.index');
    }

    public function cadastrar(Request $req)
    {
        $dados = $req->all();

        // dd($dados);

        if ($dados['senha'] != $dados['confirmarSenha']) {
            return redirect()->route('site.cadastro');
        }

        $dbUser = [
            'name' => $dados['nome'],
            'password' => bcrypt($dados['senha']),
            'email' => $dados['email'],
        ];

        User::create($dbUser);

        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])) {
            return redirect()->route('admin.cursos');
        }

        return redirect()->route('site.cadastro');

    }
}
