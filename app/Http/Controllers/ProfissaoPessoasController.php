<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Profissao;

class ProfissaoPessoasController extends Controller
{
    public function index(){
        $profissaolist = Profissao::all();
        $pessoalist = Pessoa::all();
        return view ('profissaoPessoas_file.profissaoPessoas', compact('profissaolist', 'pessoalist'));
    }

    public function selectNomes($id){
        $profissao = Profissao::find($id);
        $data = $profissao->pessoa;
        return response()->json($data);
    }

    public function selectProfissao($id){
        $pessoa = Pessoa::find($id);
        $data = $pessoa->profissao;
        return response()->json($data);
    }
}
