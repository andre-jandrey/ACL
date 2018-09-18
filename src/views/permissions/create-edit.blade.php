@extends('layouts.app')
@section('content')

<h1> {{isset($permission) ? 'Editar Permissão' : 'Cadastrar Permissão'}} </h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (!isset($permission))
    <h3>Criar permissões no estilo route resource</h3>
    <form action="{{ route('permissions.store') }}" method='POST'>
    {{ csrf_field() }}
        <div class='form-group'>
            <label>Informe o nome da tabela para que todas as permissões sejam geradas automaticamente</label>
            <blockquote class="alert alert-info">Exemplo: "users" (users.index, users.show, users.create, users.store...)</blockquote>
            <input name='name' value="{{ $permission->name ?? old('name') }}" class='form-control'/>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    </form>
@endif

<hr>
<h3 class="text-center">OU</h3>
<hr>

@if (isset($permission))
    <form method="POST" action="{{ route('permissions.update', ['id'=> $permission->id]) }}">
    {!! method_field('PUT')!!}
@else
    <h3>Criar as permissoes uma a uma.</h3>
    <form action="{{route('permissions.store')}}" method='POST'>
@endif
        {{ csrf_field() }}
        <div class='form-group'>
            <label>Rota da permissão (Ex: users.show)</label>
            <input name='name' value="{{ $permission->name ?? old('name') }}" class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Descrição: (Ex: Exibir detalhes de um usuários.)</label>
            <input name='description' value="{{ $permission->description ?? old('description') }}" class='form-control'/>
        </div>
        @if (isset($permission))
            <button type="submit" class="btn btn-primary btn-block">Alterar</button>
        @else
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        @endif
    </form>

@stop
