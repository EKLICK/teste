@extends('layouts.app')
@section('content')
   <div style="margin-top: 4%; margin-left: 2%;" class="center">
      <table style="width: 200px;">
          <thead>
            <tr>
               <th>user_type</th>
               <th>user_id</th>
               <th>event</th>
               <th>auditable_type</th>
               <th>auditable_id</th>
               <th>old_values</th>
               <th>new_values</th>
               <th>url</th>
               <th>Vizualizar</th>
            </tr>
          </thead>
          <tbody>
               @foreach ($auditorias as $auditoria)
                   <tr>
                       <td>{{$auditoria->user_type}}</td>
                       <td>{{$auditoria->user_id}}</td>
                       <td>{{$auditoria->event}}</td>
                       <td>{{$auditoria->auditable_type}}</td>
                       <td>{{$auditoria->auditable_id}}</td>
                       <td>{{$replace = str_replace_array(',', [' ', ' '], $auditoria->old_values)}}</td>
                       <td>{{$replace = str_replace_array(',', [' ', ' '], $auditoria->new_values)}}</td>
                       <td>{{$auditoria->url}}</td>
                       <td><a class="waves-effect waves-light btn orange darken-2" href="{{route('vizualizar', $auditoria->id)}}">Vizualizar</a></td>
                   </tr>
            @endforeach
          </tbody>
      </table>
   </div>
@endsection