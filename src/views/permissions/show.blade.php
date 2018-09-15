@extends('layouts.app')
@section('content')

<h1>Detalhes: </h1>
<ul>
    <li>
        <b>#: </b>{{$permission->id}}
    </li>
    <li>
        <b>Nome: </b>{{$permission->name}}
    </li>
    <li>
        <b>Descrição: </b>{{$permission->description}}
    </li>
    <li>
        <b>Criado: </b>{{$permission->created_at}}
    </li>
    <li>
        <b>Alterado: </b>{{$permission->updated_at}}
    </li>
</ul>
@stop
