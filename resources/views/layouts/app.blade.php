<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Document</title>
    <style>
      body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }
    
      main {
        flex: 1 0 auto;
      }
    </style>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper orange darken-2">
        @guest
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Cadastro</a></li>
          </ul>
        @else
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="{{route('pessoas.index')}}">PESSOAS</a></li>
            <li><a href="{{route('cidades.index')}}">CIDADES</a></li>
            <li><a href="{{route('profissoes.index')}}">PROFISSÕES</a></li>
            <li><a href="{{route('musicas.index')}}">MUSICAS</a></li>
            <li><a href='{{route('historico')}}'>HISTORICO DE TAREFAS</a></li>
            <li><a href="{{route('profissaopessoas.index')}}">PROFISSÕES X PESSOAS</a></li> 
          </ul>
          <ul id="nav-mobile" class="right hide-on-med-and-down"> 
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
          </ul>
        @endguest
      </div>
    </nav>

    <main>
      @yield('content')
    </main>

    <footer class="page-footer orange darken-2">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Conteúdo</h5>
              <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="https://laravel.com/">https://laravel.com/</a></li>
                <li><a class="grey-text text-lighten-3" href="https://materializecss.com/">https://materializecss.com/</a></li>
                <li><a class="grey-text text-lighten-3" href="https://www.w3schools.com/">https://www.w3schools.com/</a></li>
                <li><a class="grey-text text-lighten-3" href="https://www.google.com/">https://www.google.com/</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
          © 2014 Copyright Text
          </div>
        </div>
      </footer>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <script src="{{asset('js/profissoes_Pessoas.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/edit_delete_create.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/deleted.js')}}" type="text/javascript"></script>
      <script>M.AutoInit();</script>
  </body>
</html>