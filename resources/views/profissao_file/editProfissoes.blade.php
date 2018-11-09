@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('profissoes.update', $profissao->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row container" style="margin-top: 2%; margin-left: 25%;">
            <div class="col s12">
                <div class="row container">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" id="autocomplete-input" class="autocomplete" name="nome" value="{{$profissao->nome}}">
                        <label for="autocomplete-input">Nome da profissão</label>
                    </div>
                </div>
                <div class="row container">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">format_color_text</i>
                        <input type="text" id="autocomplete-input" class="autocomplete" name="descricao" value="{{$profissao->descricao}}">
                        <label for="autocomplete-input">Descrição da profissão</label>
                    </div>
                </div>
                <div class="input-field col s8">
                    <div class="file-field input-field">
                        <div class="file-field input-field">
                            <div class="btn">
                              <span>File</span>
                              <input type="file" name="img_profissao">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    @if($profissao->img_profissao != null)
                        <img width="150" src="{{asset($profissao->img_profissao)}}"/>
                    @else
                        <img width="150" src="{{asset('img/img_profissoes/img_error.png')}}"/>
                    @endif
                </div>
                <br><br><br>
                <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
@endsection