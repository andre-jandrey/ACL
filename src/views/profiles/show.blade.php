@extends('layouts.app')
@section('content')

<h1>Detalhes: </h1>
<ul>
    <li>
        <b>#: </b>{{$profile->id}}
    </li>
    <li>
        <b>Nome: </b>{{$profile->name}}
    </li>
    <li>
        <b>Criado: </b>{{$profile->created_at}}
    </li>
    <li>
        <b>Alterado: </b>{{$profile->updated_at}}
    </li>
</ul>
@stop
