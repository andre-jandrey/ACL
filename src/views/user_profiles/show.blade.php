@extends('layouts.app')
@section('content')
<h1>Detalhes: </h1>
<ul>
    <li>
        <b>Usuário: </b>{{$user_profile->users_id}}
    </li>
    <li>
        <b>Perfil:< /b>{{$user_profile->profiles_id}}
    </li>
    <li>
        <b>Criado: </b>{{$user_profile->created_at}}
    </li>
    <li>
        <b>Alterado: </b>{{$user_profile->updated_at}}
    </li>
</ul>
@stop
