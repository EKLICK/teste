@extends('layouts.app')

@section('content')
<table>
    <tr>
        <td><h5>User Type:</h5></td>
        <td>{{$auditoria->user_type}}</td>
    </tr>
    <tr>
        <td><h5>User ID</h5></td>
        <td>{{$auditoria->user_id}}</td>
    </tr>
    <tr>
        <td><h5>Event:</h5></td>
        <td>{{$auditoria->event}}</td>
    </tr>
    <tr>
        <td><h5>Auditable Type:</h5></td>
        <td>{{$auditoria->auditable_type}}</td>
    </tr>
    <tr>
        <td><h5>Auditable ID</h5></td>
        <td><h5>{{$auditoria->auditable_id}}</h5></td>
    </tr>
    <tr>
        <td><h5>Old Value:</h5></td>
        <td><h5>{{$auditoria->old_values}}</h5></td>
    </tr>
    <tr>
        <td><h5>New Value:</h5></td>
        <td>{{$auditoria->new_values}}</td>
    </tr>
    <tr>
        <td><h5>URL:</h5></td>
        <td>{{$auditoria->url}}</td>
    </tr>
    <tr>
        <td><h5>IP Address:</h5></td>
        <td>{{$auditoria->ip_address}}</td>
    </tr>
    <tr>
        <td><h5>User Agent:</h5></td>
        <td>{{$auditoria->user_agent}}</td>
    </tr>
    <tr>
        <td><h5>TAGS:</h5></td>
        <td>{{$auditoria->tags}}</td>
    </tr>
    <tr>
        <td>
            <a href="{{route('pdf_hist', $auditoria->id)}}" class="waves-effect waves-light btn-large">Carregar PDF</a>
            <a href="{{route('excel')}}" class="waves-effect waves-light btn-large">Carregar EXCEL</a>
        </td>
    </tr>
</table>
@endsection