<?php

namespace App\Http\Controllers;

use App\Profissao;
use App\Cidade;
use App\Pessoa;
use App\Musica;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\PessoaStoreRequest;
use Illuminate\Support\Facades\Session;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoaslist = Pessoa::all();
        return view('pessoas_file.pessoas', compact('pessoaslist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profissoes = Profissao::all();
        $cidades = Cidade::all();
        $musicas = Musica::all();
        $estados = Estado::all();
        return response()->json([$cidades, $profissoes, $musicas, $estados]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaStoreRequest $request)
    {
        $dataForm = $request->all();
        unset($dataForm['estado_id']);
        
        if(isset($dataForm['musicas'])){
            $pessoa = Pessoa::create($dataForm);
            $pessoa->musica()->attach($dataForm['musicas']);
        }else{
            $pessoa = Pessoa::create($dataForm);
        }
        //cria a sessão, define o nome em "mensagem"
        Session::put('mensagem', "A pessoa " . $pessoa->nome . " foi cadastrada com sucesso!");

        return redirect()->Route('pessoas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas_file.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = Pessoa::with(['musica', 'profissao', 'cidade'])->find($id);
        $cidades = Cidade::all();
        $profissoes = Profissao::all();
        $musicas = Musica::all();
        $estados = Estado::all();
        return response()->json([$pessoa, $cidades, $profissoes, $musicas, $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $pessoa = Pessoa::find($dataForm['id']);
        $pessoa->update($dataForm);
        if(isset($dataForm['musicas']))
            $pessoa->musica()->sync($dataForm['musicas']);
        return redirect()->Route('pessoas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dataForm = $request->all();
        $pessoa = Pessoa::find($dataForm['id']);
        $pessoa->delete();
        return redirect()->Route('pessoas.index');
    }

    //ajax
    public function cidadesDoEstado($id){
        $estado = Estado::find($id);
        $data = $estado->cidade;
        return response()->json($data);
    }

    //soft deleting
    public function deletadas(){
        $deletados = Pessoa::onlyTrashed()->get();
        return view('pessoas_file.pessoasDeletadas', compact('deletados'));
    }

    public function restore(Request $request, $id){
        $deletados = Pessoa::onlyTrashed()->get();
        $deletado = $deletados->find($request['id']);
        $deletado->restore();
        return redirect()->Route('pessoas.index');
    }

    public function destroyForever(Request $request, $id){
        $deletados = Pessoa::onlyTrashed()->get();
        $deletado = $deletados->find($request['id']);
        $deletado->forceDelete();
        return redirect()->Route('pessoas.index');
    }
}
