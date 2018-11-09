@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card" style="margin-top: 5%; margin-left: 20%; margin-right: 25%;">
    <div class="row">
        <form class="col s12" action="{{route('register')}}" method="post">
            @csrf
            <div class="row">
                <div class="input-field col s11">
                    <i class="material-icons prefix">account_circle</i>
                    <input name="name" id="nome" type="text" class="validate">
                    <label for="nome">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s11">
                    <i class="material-icons prefix">location_city</i>
                    <input name="cidade" id="cidade" type="text" class="validate">
                    <label for="cidade">Cidade</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s11">
                    <i class="material-icons prefix">mood</i>
                    <input name="username" id="usuario" type="text" class="validate">
                    <label for="usuario">Usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s11">
                    <i class="material-icons prefix">email</i>
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s11">
                    <i class="material-icons prefix">fingerprint</i>
                    <input name="password" id="senha" type="password" class="validate">
                    <label for="senha">Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s11">
                        <i class="material-icons prefix">lock_outline</i>
                    <input name="password_confirmation" id="c_senha" type="password" class="validate">
                    <label for="c_senha">Confirma senha</label>
                </div>
            </div>
            <button type="submit" class="btn" style="margin-bottom: 4%;">Enviar</button>
        </form>
    </div>
</div>
</div>
@endsection