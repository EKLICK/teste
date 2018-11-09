@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('cidades.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row container" style="margin-top: 2%;">
            <div class="col s12 push-s3">
                <div class="row container">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">work</i>
                        <input name="nome" id="nome" type="text" class="validate">
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
                    <div class="row container">
                        <div class="input-field col s12">
                            <select name="estado_id">
                                <option value="" disabled selected>Escolha o estado</option>
                                @forelse($estadolist as $estado)
                                  <option value="{{$estado->id}}">{{$estado->nome}}</option>
                                @empty
                                  <option disabled>Nenhum estado cadastrada</option>
                                @endforelse
                            </select>
                            <label>Estados</label>
                        </div>
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