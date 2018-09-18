@extends('layouts.app')
@section('content')

<h1> {{isset($profile) ? 'Editar Perfil' : 'Cadastrar Perfil'}} </h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (isset($profile) )
    <form method="POST" action="{{ route('profiles.update', ['id'=> $profile->id]) }}">
    {!! method_field('PUT')!!}
@else
    <form action="{{ route('profiles.store') }}" method='POST'>
@endif
    {{ csrf_field() }}
        <div class='form-group'>
            <label>Nome: </label>
            <input name='name' value="{{ $profile->name ?? old('name') }}" class='form-control'/>
        </div>
        @if (isset($profile) )
            <button type="submit" class="btn btn-primary btn-block">Alterar</button>
        @else
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        @endif
    </form>
@stop
