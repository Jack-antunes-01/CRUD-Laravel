<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function entrar(Request $req)
    {
        $dados = $req->all();

        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])) {
            return redirect()->route('admin.cursos');
        }

        return redirect()->route('site.login');

    }

    public function sair()
    {
        Auth::logout();

        return redirect()->route('site.home');
    }
}
