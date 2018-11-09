<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audits;

class HistoricoController extends Controller
{
    public function index(){
        $auditorias = Audits::all();
        return view ('historico_file.historico', compact('auditorias'));
    }

    public function vizualizar($id){
        $auditoria = Audits::find($id);
        return view ('historico_file.historicoVizualizar', compact('auditoria'));
    }
}
