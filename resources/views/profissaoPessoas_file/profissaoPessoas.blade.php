@extends('layouts.app')
@section('content')
<div class="row">
    <table>
        <tr>
            <td>
                <div class="col s12">
                    <div class="row container">
                        <div class="input-field col s8">
                            <select name="nome_profissoes" id="nome_profissoes">
                                <option value="" disabled selected>Selecione uma profissao</option>
                                @forelse($profissaolist as $profissao)
                                  <option value="{{$profissao->id}}">{{$profissao->nome}}</option>
                                @empty
                                  <option disabled>Nenhuma profissao cadastrada</option>
                                @endforelse
                            </select>
                            <label>Profissao</label>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="input-field col s8">
                            <select name="nome_pessoas" id="nome_pessoas">
                                <option value="" disabled selected>Selecione uma pessoa</option>
                            </select>
                            <label>Pessoas</label>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="col s12">
                    <div class="row container">
                        <div class="input-field col s8">
                            <select name="pessoas_nome" id="pessoas_nome">
                                <option value="" disabled selected>Selecione uma pessoa</option>
                                @forelse($pessoalist as $pessoa)
                                  <option value="{{$pessoa->id}}">{{$pessoa->nome}}</option>
                                @empty
                                  <option disabled>Nenhuma pessoa cadastrada</option>
                                @endforelse
                            </select>
                            <label>Pessoas</label>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="input-field col s8">
                            <select name="profissoes_nome" id="profissoes_nome">
                                <option value="" disabled selected>Selecione uma profissão</option>
                            </select>
                            <label>Profissões</label>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
@endsection