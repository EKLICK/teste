@extends('layouts.app')
@section('content')
    <div style="margin-top: 4%; margin-left: 15%;" class="container">
        <table>
            <thead>
                <tr>
                    <th>Nome da pessoa</th>
                    <th>Data de exclusão</th>
                    <th>Restaurar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletados as $pessoa)
                    <tr>
                        <td><h4>{{$pessoa->nome}}</h4></td>
                        <td><h5>{{$pessoa->deleted_at}}</h5></td>
                        <td><a class="modal-trigger btn-deletados" href="#modal5" data-id="{{$pessoa->id}}" data-name="{{$pessoa->nome}}"><i class="material-icons medium">create_new_folder</i></a></td>
                        <td><a class="modal-trigger btn-deletados" href="#modal4" data-id="{{$pessoa->id}}" data-name="{{$pessoa->nome}}"><i class="material-icons medium">delete_forever</i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>

    <div id="modal5" class="modal">
        <form action="{{route('pessoas.restore', 'update')}}" method="GET">
            @csrf
            <div class="modal-content">
                <h4>Restaurar</h4>
                <p>Você tem certeza que deseja restaurar a pessoa abaixo?</p>
                <div class="row">
                    <label for="name_deletados1">Nome:</label>
                    <div class="input-field col s12">
                        <input class="validate" name="id" type="number" id="id_deletados1" hidden>
                        <input class="validate" type="text" id="name_deletados1" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn green delete" type="submit">Sim</button>
            </div>
        </form>
    </div>

    <div id="modal4" class="modal">
        <form action="{{route('pessoas.destroyforever', 'delete')}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <h4>Deletar</h4>
                <p>Você tem certeza que deseja deletar para sempre a pessoa abaixo?</p>
                <div class="row">
                    <label for="name_deletados2">Nome:</label>
                    <div class="input-field col s12">
                        <input class="validate" name="id" type="number" id="id_deletados2" hidden>
                        <input class="validate" type="text" id="name_deletados2" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn red delete" type="submit">Sim</button>
            </div>
        </form>
    </div>
@endsection