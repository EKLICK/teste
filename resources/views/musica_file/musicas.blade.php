@extends('layouts.app')
@section('content')
   <div style="margin-top: 4%; margin-left: 15%;" class="container">
      <table>
          <thead>
            <tr>
               <th>Nome da pessoa</th>
               <th>Quant. pessoas</th>
               <th>Reg. pessoas</th>
               <th>Editar</th>
               <th>Deletar</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($musicalist as $musica)
                   <tr>
                       <td><h4>{{$musica->nome}}</h4></td>
                       <td><h3>{{count($musica->pessoa)}}</h3></td>
                       <td><a href="{{route('musicaRegistro', $musica->id)}}"><i class="material-icons medium">assignment_ind</i></a></td>
                       <td><a href="{{Route('musicas.edit', $musica->id)}}"><i class="material-icons medium">edit</i></a></td>
                       <td>
                           <a data-id="{{$musica->id}}" data-name="{{$musica->nome}}" class="material-icons modal-trigger" href="#modal1"><i class="material-icons medium">clear</i></a>
                       </td>
                   </tr>
            @endforeach
          </tbody>
      </table>
      <div style="margin-top: 5%;">
          <a style="color: #1de9b6;" href="{{route('musicas.create')}}"><i class="material-icons medium">add_circle</i></a>
      </div>
   </div>


   <div id="modal1" class="modal">
        <form action="{{route('musicas.destroy', 'delete')}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <h4>Deletar</h4>
                <p>Você tem certeza que deseja deletar a musica abaixo?</p>
                <div class="row">
                    <label for="name_delete">Nome:</label>
                    <div class="input-field col s12">
                        <input class="validate" hidden name="id" type="number" id="id_delete">
                        <input disabled class="validate" type="text" id="name_delete">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn red delete" type="submit">Sim</button>
            </div>
        </form>
    </div>


@endsection