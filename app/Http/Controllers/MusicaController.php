<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musica;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicalist = Musica::all();
        return view ('musica_file.musicas', compact('musicalist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musica_file.createMusicas');
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
       Musica::create($dataForm);
        return redirect()->Route('musicas.index');
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
        $musica = Musica::find($id);
        return view('musica_file.editMusicas', compact('musica'));
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
        $musica = Musica::find($id);
        $musica->update($dataForm);
        return redirect()->Route('musicas.index');
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
        $musica = Musica::find($dataForm['id']);
        $musica->delete();
        return redirect()->Route('musicas.index');
    }

    public function pessoasMusicas_index($id){
        $musica = Musica::find($id);
        $pessoasList = $musica->pessoa;
        return view ('musica_file.musicasPessoas', compact('pessoasList'));
    }
}
