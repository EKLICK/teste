 @extends('layouts.app')
 @section('content')
    <div style="margin-top: 4%; margin-left: 15%;" class="container">

        @if( isset($errors) && count($errors) > 0 )
            <div class="center-align">
                @foreach( $errors->all() as $error )
                    <div class="chip red">
                        {{$error}}
                        <i class="close material-icons">close</i>
                    </div>
                @endforeach
            </div>
        @endif

        @if(Session::get('mensagem'))
            <div class="center-align">
                    <div class="chip green">
                        {{Session::get('mensagem')}}
                        <i class="close material-icons">close</i>
                    </div>
                </div>
            {{Session::forget('mensagem')}}
        @endif

       <table>
           <thead>
             <tr>
                <th>Nome da pessoa</th>
                <th>CPF</th>
                <th>Cidade</th>
                <th>Profissão</th>
                <th>Musicas</th>
                <th>Editar</th>
                <th>Deletar</th>
             </tr>
           </thead>
           <tbody>
                @foreach ($pessoaslist as $pessoa)
                    <tr>
                        <td><h4>{{$pessoa->nome}}</h4></td>
                        <td><h4>{{$pessoa->cpf}}</h4></td>
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
                        <td>
                            <a id="btn-edit" class="modal-trigger" href="#modal2" data-id="{{$pessoa->id}}"><i class="material-icons medium">edit</i></a>
                        </td>
                        <td>
                            <a id="btn-delete" class="modal-trigger" href="#modal1" data-id="{{$pessoa->id}}" data-name="{{$pessoa->nome}}"><i class="material-icons medium">clear</i></a>
                        </td>
                    </tr>
                @endforeach
           </tbody>
       </table>
           <a id="btn-create" class="modal-trigger" href="#modal3"><i class="material-icons medium">add_circle</i></a>
           <a href="{{route('pessoas.deletadas')}}"><i class="material-icons medium right">delete</i></a>
    </div>

    <div id="modal3" class="modal">
        <form action="{{route('pessoas.store')}}" method="POST">
            @csrf
            <div class="modal-content container">
                <div class="input-field col container">
                    <i class="material-icons prefix">account_circle</i>
                    <input class="validate" name="nome" type="text" id="nome-create" value="" required>
                    <label for="nome-edit">Nome</label>
                </div>
                <div class="input-field col container">
                    <i class="material-icons prefix">account_circle</i>
                    <input class="validate" name="cpf" type="number" id="cpf-edit" value="" required>
                    <label for="cpf-edit">CPF</label>
                </div>
                <div class="input-field col container">
                        <i class="material-icons prefix">place</i>
                    <select name="estado_id" id="estados-create">
                    </select>
                    <label>Estados</label>
                </div>
                <div class="input-field col container">
                        <i class="material-icons prefix">location_city</i>
                    <select name="cidade_id" id="cidades-create">
                    </select>
                    <label>Cidades</label>
                </div>
                <div class="input-field col container">
                        <i class="material-icons prefix">work</i>
                    <select name="profissao_id" id="profissoes-create">
                    </select>
                    <label>Profissões</label>
                </div>
                <div class="input-field col container" id="checkboxes"></div>
                <button style="margin-left: 15%" class="btn waves-effect waves-light" id="btn-update" type="submit" name="action">Salvar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>

    <div id="modal2" class="modal">
        <form action="{{route('pessoas.update', 'update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content container">
                <input hidden class="validate" name="id" type="number" id="id-edit" value="">
                <div class="input-field col container">
                    <i class="material-icons prefix">account_circle</i>
                    <input class="validate" name="nome" type="text" id="nome-edit" value="">
                    <label for="nome-edit">Nome</label>
                </div>
                <div class="input-field col container">
                    <i class="material-icons prefix">account_circle</i>
                    <input class="validate" name="cpf" type="number" id="cpf-edit" value="" required>
                    <label for="cpf-edit">CPF</label>
                </div>
                <div class="input-field col container">
                        <i class="material-icons prefix">place</i>
                    <select name="estado_id" id="estados-edit">
                    </select>
                    <label>Estados</label>
                </div>
                <div class="input-field col container">
                        <i class="material-icons prefix">location_city</i>
                    <select name="cidade_id" id="cidades-edit">
                    </select>
                    <label>Cidades</label>
                </div>
                <div class="input-field col container">
                        <i class="material-icons prefix">work</i>
                    <select name="profissao_id" id="profissoes-edit">
                    </select>
                    <label>Profissões</label>
                </div>
                <div class="input-field col container" id="checkboxes"></div>
                <button style="margin-left: 15%" class="btn waves-effect waves-light" id="btn-update" type="submit" name="action">Salvar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
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