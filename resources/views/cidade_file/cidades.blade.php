@extends('layouts.app')
@section('content')
   <div style="margin-top: 4%; margin-left: 15%;" class="container">
      <table>
          <thead>
            <tr>
               <th>Nome da cidade</th>
               <th>Imagem da cidade</th>
               <th>Estado</th>
               <th>Editar</th>
               <th>Deletar</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($cidadeslist as $cidade)
                   <tr>
                       <td><h5>{{$cidade->nome}}</h5></td>
                       @if($cidade->img_cidade != null)
                            <td><img width="150" src="{{asset($cidade->img_cidade)}}"/></td>
                        @else
                            <td><img width="150" src="{{asset('img/img_cidades//img_error.png')}}"/></td>
                        @endif
                        <td style="width: 150px;">
                            @if ($cidade->estado_id != null)
                                {{$cidade->estado->nome}}
                            @else
                                Nenhum estado cadastrado nesta cidade
                            @endif
                            
                        </td>
                       <td><a href="{{Route('cidades.edit', $cidade->id)}}"><i class="material-icons medium">edit</i></a></td>
                       <td>
                           <a data-id="{{$cidade->id}}" data-name="{{$cidade->nome}}" class="material-icons modal-trigger" href="#modal1"><i class="material-icons medium">clear</i></a>
                       </td>
                   </tr>
            @endforeach
          </tbody>
      </table>
      <div style="margin-top: 5%;">
          <a style="color: #1de9b6;" href="{{route('cidades.create')}}"><i class="material-icons medium">add_circle</i></a>
      </div>
   </div>


   <div id="modal1" class="modal">
       <form action="{{route('cidades.destroy', 'delete')}}" method="POST">
           @method('DELETE')
           @csrf
           <div class="modal-content">
               <h4>Deletar</h4>
               <p>Você tem certeza que deseja deletar a cidade abaixo?</p>
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