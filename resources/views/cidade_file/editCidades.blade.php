@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('cidades.update', $cidade->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row container" style="margin-top: 2%;">
            <div class="col s12 push-s3">
                <div class="row container">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">work</i>
                        <input name="nome" id="nome" type="text" class="validate" value="{{$cidade->nome}}">
                        <label for="nome">Nome da cidade</label>
                    </div>
                    <div class="input-field col s8">
                        <div class="file-field input-field">
                            <div class="file-field input-field">
                                <div class="btn">
                                  <span>File</span>
                                  <input type="file" name="img_cidade">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    @if($cidade->img_cidade != null)
                        <img width="150" src="{{asset($cidade->img_cidade)}}"/>
                    @else
                        <img width="150" src="/img/img_cidades//img_error.png"/>
                    @endif
                </div>
                <br>
                <div class="row container">
                    <div class="input-field col s12">
                        <select name="estado_id">
                            <option value="" disabled selected>Escolha o estado</option>
                            @forelse($estadolist as $estado)
                              <option @if ($estado->id == isset($cidade->estado->id)) selected   @endif value="{{$estado->id}}">{{$estado->nome}}</option>
                            @empty
                              <option disabled>Nenhum estado cadastrada</option>
                            @endforelse
                        </select>
                        <label>Estados</label>
                    </div>
                </div>
                <button style="margin-bottom: 20px" class="btn waves-effect waves-light" type="submit" name="action">Salvar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
@endsection