@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('musicas.update', $musica->id)}}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row container">
            <div class="col s12 push-s3">
                <div class="row container">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">music_note</i>
                        <input name="nome" id="nome" type="text" class="validate" value="{{$musica->nome}}">
                        <label for="nome">Nome da musica</label>
                    </div>
                </div>
                <br>
                <button style="margin-bottom: 20px" class="btn waves-effect waves-light" type="submit" name="action">Salvar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
@endsection