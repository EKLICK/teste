@extends('layouts.app')
@section('content')
   <div style="margin-top: 4%; margin-left: 15%;" class="container">
      <table>
        <thead>
            <tr>
               <th>Nome da pessoa</th>
               <th>Cidade</th>
               <th>Profissão</th>
               <th>Musicas</th>
               <th>Deletar</th>
               <th>Editar</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($pessoasList as $pessoa)
                    <tr>
                       <td><h4>{{$pessoa->nome}}</h4></td>
                       <td>
                            @if($pessoa->cidade != null) 
                                <img width="150" src="{{asset($pessoa->cidade->img_cidade)}}"><br>{{$pessoa->cidade->nome}}
                            @else
                            <img width="150" src="{{asset('img/img_cidades/img_error.png')}}"><br>nenhuma cidade
                            @endif
                        </td>
                        <td>
                            @if($pessoa->profissao != null) 
                                <img width="150" src="{{asset($pessoa->profissao->img_profissao)}}"><br>{{$pessoa->profissao->profissao}}
                            @else
                            <img width="150" src="{{asset('img/img_profissoes/img_error.png')}}"><br>nenhuma profissão
                            @endif
                        </td>
                        <td>@foreach($pessoa->musica as $musica) {{$musica->nome}} <br> @endforeach</td>
                        <td><a href="{{Route('pessoas.edit', $pessoa->id)}}"><i class="material-icons medium">edit</i></a></td>
                        <td>
                            <a data-id="{{$pessoa->id}}" data-name="{{$pessoa->nome}}" class="material-icons modal-trigger" href="#modal1"><i class="material-icons medium">delete</i></a>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>


   <div id="modal1" class="modal">
           <form action="{{route('pessoas.destroy', 'delete')}}" method="POST">
               @method('DELETE')
               @csrf
               <div class="modal-content">
                   <h4>Deletar</h4>
                   <p>Você tem certeza que deseja deletar a pessoa abaixo?</p>
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