<?php

namespace App\Http\Controllers\Admin;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $registros = Curso::all();

        return view('admin.cursos.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.cursos.adicionar');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        if (isset($dados['publicado'])) {
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }

        if ($req->hasFile('imagem')) {

            // Armazena o arquivo na variável imagem
            $imagem = $req->file('imagem');
            // Gera um número randômico
            $num = rand(1111, 9999);
            // Diretório pra salvar a imagem
            $dir = "img/cursos/";
            // Extensão do arquivo
            $ext = $imagem->guessClientExtension();
            // Montando o nome da imagem
            $nomeImagem = "imagem_" . $num . "." . $ext;
            // Movendo a imagem para o diretório específico
            $imagem->move($dir, $nomeImagem);
            // Alterando o atributo imagem para apenas o diretório já que todas suas informações já foram salvas
            $dados['imagem'] = $dir . "/" . $nomeImagem;

        }

        Curso::create($dados);

        return redirect()->route('admin.cursos');

    }

    public function editar($id)
    {
        $registro = Curso::find($id);

        return view('admin.cursos.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        if (isset($dados['publicado'])) {
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }

        if ($req->hasFile('imagem')) {

            // Armazena o arquivo na variável imagem
            $imagem = $req->file('imagem');
            // Gera um número randômico
            $num = time();
            // Diretório pra salvar a imagem
            $dir = "img/cursos/";
            // Extensão do arquivo
            $ext = $imagem->guessClientExtension();
            // Montando o nome da imagem
            $nomeImagem = "imagem_" . $num . "." . $ext;
            // Movendo a imagem para o diretório específico
            $imagem->move($dir, $nomeImagem);
            // Alterando o atributo imagem para apenas o diretório já que todas suas informações já foram salvas
            $dados['imagem'] = $dir . "/" . $nomeImagem;

        }

        Curso::find($id)->update($dados);

        return redirect()->route('admin.cursos');
    }

    public function deletar($id)
    {
        Curso::find($id)->delete();

        return redirect()->route('admin.cursos');
    }

}
