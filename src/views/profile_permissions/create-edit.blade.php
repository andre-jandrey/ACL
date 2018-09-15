@extends('layouts.app')
@section('content')

<h1>{{isset($profile_permissions) ? 'Editar Profile_permissions' : 'Cadastrar Profile_permissions'}}</h1>

@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (isset($profile_permissions))
    <form method="post" action="{{route('profile_permissions.update', ['id'=> $profile_permissions ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('profile_permissions.store')}}" method='post'>
    @endif

        {{ csrf_field() }}
        <div class="form-group">
            <label>Profile</label>
            <select name="profiles_id" class="form-control">
                @foreach ($profiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Permission</label><br>
                @foreach ($permissions as $permission)
                <input type="checkbox" name="permissions_id[]" value="{{ $permission->id }}">{{ $permission->description }}<br>
                @endforeach
        </div>
        @if (isset($dados))
            <button type="submit" class="btn btn-primary btn-block">Alterar</button>
        @else
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
        @endif
    </form>
@stop
