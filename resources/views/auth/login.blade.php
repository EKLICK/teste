@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style=" margin: 5% 25% 10%; ">
        <div class="row">
            <form class="col s12" action="{{route('login')}}" method="post">
                @csrf
                <div class="row">
                    <div class="input-field col s11">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="identity" id="identity" type="text" class="validate">
                        <label for="identity">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s11">
                        <i class="material-icons prefix">fingerprint</i>
                        <input name="password" id="senha" type="password" class="validate">
                        <label for="senha">Senha</label>
                    </div>
                </div>
                <button class="btn" type="submit" style="margin-bottom: 4%;">Login</button>
            </form>
        </div>
    </div>


</div>
@endsection
