<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\Estado;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Functions to controller images
    public function deleteDbImage($imagemFile){
        if($imagemFile == null){
            unlink($imagemFile);
        }
    }

    public function saveDbImage($req){
        $data = $req->all();

        $imagem = $req->file('img_cidade');
        $num = rand(1111, 9999);
        $dir = "img/img_cidades";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir, $nomeImagem);
        $data['img_cidade'] = $dir."/".$nomeImagem;

        return $data;
    }

    public function index()
    {
        $cidadeslist = Cidade::all();
        return view('cidade_file.cidades', compact('cidadeslist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadolist = Estado::all();
        return view('cidade_file.createCidade', compact('estadolist'));
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
        if($request->hasFile('img_cidade')){
            $dataForm = $this->saveDbImage($request);
        }
        Cidade::create($dataForm);
        return redirect()->Route('cidades.index');
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
        $cidade = Cidade::find($id);
        $estadolist = Estado::all();
        return view('cidade_file.editCidades', compact('cidade', 'estadolist'));
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
        $cidade = Cidade::find($id);
        $dataForm = $request->all();

        if($cidade->img_cidade != null)
            $this->deleteDbImage($cidade->img_cidade);
        if($request->hasFile('img_cidade')){
            $dataForm = $this->saveDbImage($request);
        }else{    
            $cidade->img_cidade = null;
            $cidade->save();
        }
        $cidade->update($dataForm);
        return redirect()->Route('cidades.index');
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
        $cidade = Cidade::find($dataForm['id']);
        $this->deleteDbImage($cidade->img_cidade);
        $cidade->delete();
        return redirect()->Route('cidades.index');
    }
}
