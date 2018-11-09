<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1 style="text-align: center;">Histórico ID: {{$auditoria->id}}</h1>
        <br>
        <hr>
        <br>
        <h3>Dados do Usuario:</h3>
        <ul>
            <li><b>Tipo de Usuario: </b> {{substr($auditoria->user_type, 4)}}</li>
            <li><b>ID do usuário: </b>{{$auditoria->user_id}}</li>
            <li><b>IP do usuário: </b>
                @if ($auditoria->ip_address == "::1")
                    Localhost
                @else
                    $auditoria->ip_address
                @endif
            </li>
            <li><b>Link: </b>{{$auditoria->url}}</li>
        </ul>
        <br>
        <hr>
        <br>
        <h3>Dados de Conteúdo</h3>
        <ul>
            <li><b>Tipo de evento: </b>{{$auditoria->event}}</li>
            <li><b>Nome do banco: </b>{{substr($auditoria->auditable_type, 4)}}</li>
            <li><b>ID do campo: </b>{{$auditoria->auditable_id}}</li>
            <li><b>Valores antigos: </b>
                @if ($auditoria->old_values == "[]")
                    Ação sem valores antigos
                @else
                    {{$auditoria->old_values}}
                @endif
            </li>
            <li><b>Valores novos: </b>{{$auditoria->new_values}}</li>
            <li><b>Comentario: </b>
                @if (isset($auditoria->tags))
                    {{$auditoria->tags}}
                @else
                    Nenhum comentário anexado!
                @endif
            </li>
        </ul>
        <br>
        <hr>
    </body>
</html>