<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissao;

class ProfissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Functions to controller
    public function deleteDbImage($imagemFile){
        unlink($imagemFile);
    }

    public function saveDbImage($req){
        $data = $req->all();

        $imagem = $req->file('img_profissao');
        $num = rand(1111, 9999);
        $dir = "img/img_profissoes";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir, $nomeImagem);
        $data['img_profissao'] = $dir."/".$nomeImagem;

        return $data;
    }

    public function index()
    {
        $profissoeslist = Profissao::paginate(3);
        return view('profissao_file.profissoes', compact('profissoeslist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profissao_file.createProfissao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
        if($request->hasFile('img_profissao')){
            $dataForm = $this->saveDbImage($request);
        }
        Profissao::create($dataForm);
        return redirect()->route('profissoes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profissao = Profissao::find($id);
        return view('profissao_file.editProfissoes', compact('profissao'));
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
        $profissao = Profissao::find($id);
        $dataForm = $request->all();

        if($profissao->img_profissao != null)
            $this->deleteDbImage($profissao->img_profissao);
        if($request->hasFile('img_profissao')){
            $dataForm = $this->saveDbImage($request);
        }else{    
            $profissao->img_profissao = null;
            $profissao->save();
        }
        $profissao->update($dataForm);
        return redirect()->Route('profissoes.index');
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
        $profissao = Profissao::find($dataForm['id']);
        $this->deleteDbImage($profissao->img_profissao);
        $profissao->delete();
        return redirect()->Route('profissoes.index');
    }
}
