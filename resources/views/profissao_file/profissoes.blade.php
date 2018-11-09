@extends('layouts.app')
@section('content')
   <div style="margin-top: 4%; margin-left: 15%;" class="container">
      <table>
          <thead>
            <tr>
               <th>Nome da profissão</th>
               <th>Imagem da profissão</th>
               <th>Descrição</th>
               <th>Editar</th>
               <th>Deletar</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($profissoeslist as $profissao)
                   <tr>
                       <td><h5>{{$profissao->nome}}</h5></td>
                       @if($profissao->img_profissao != null)
                            <td><img width="150" src="{{asset($profissao->img_profissao)}}"/></td>
                        @else
                            <td><img width="150" src="img/img_profissoes//img_error.png"/></td>
                        @endif
                       <td style="width: 200px;">{{$profissao->descricao}}</td>
                       <td><a href="{{Route('profissoes.edit', $profissao->id)}}"><i class="material-icons medium">edit</i></a></td>
                       <td>
                           <a data-id="{{$profissao->id}}" data-name="{{$profissao->nome}}" class="material-icons modal-trigger" href="#modal1"><i class="material-icons medium">clear</i></a>
                       </td>
                   </tr>
            @endforeach
          </tbody>
      </table>
      {{$profissoeslist->links()}}
      <div style="margin-top: 5%;">
          <a style="color: #1de9b6;" href="{{route('profissoes.create')}}"><i class="material-icons medium">add_circle</i></a>
      </div>
   </div>


   <div id="modal1" class="modal">
       <form action="{{route('profissoes.destroy', 'delete')}}" method="POST">
           @method('DELETE')
           @csrf
           <div class="modal-content">
               <h4>Deletar</h4>
               <p>Você tem certeza que deseja deletar a profissão abaixo?</p>
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