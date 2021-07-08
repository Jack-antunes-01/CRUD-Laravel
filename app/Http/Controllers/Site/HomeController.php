<?php

namespace App\Http\Controllers\Site;

use App\Curso;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(3);
        return view('home', compact('cursos'));
    }
}
