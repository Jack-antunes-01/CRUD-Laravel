<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = [
            (object) ["nome" => "Maria", "tel" => "12645564"],
            (object) ["nome" => "Ricardo", "tel" => "45678912"],
        ];

        $contato = new Contato();

        $con = $contato->lista();

        dd($con->nome);

        return view('contato.index', compact('contatos'));
    }

    public function criar(Request $req)
    {
        dd($req->all());
        return "Criar controller";
    }

    public function editar()
    {
        return "Editar controller";
    }
}
