@extends('layouts.app')
@section('content')
<h1>Detalhes: </h1>
<ul>
    <li>
        <b>permissions_id:</b>{{$profile_permissions->permissions_id}}
    </li>
    <li>
        <b>profiles_id:</b>{{$profile_permissions->profiles_id}}
    </li>
    <li>
        <b>created_at:</b>{{$profile_permissions->created_at}}
    </li>
    <li>
        <b>updated_at:</b>{{$profile_permissions->updated_at}}
    </li>
</ul>@stop
