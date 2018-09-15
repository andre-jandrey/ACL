@extends('layouts.app')
@section('content')

<h1>Listagem de permissões por Perfil
    <a class='btn btn-primary' href="{{ route('profile_permissions.create') }}">
        <i class="fas fa-plus-circle"></i>Novo
    </a>
</h1>

<table id="table_pfpermissions" style="width:100%" class='display table table-striped table-bordered table-hover'>
    <thead>
        <tr>
            <th>ID Permissão</th>
            <th>ID Perfil</th>
            <th>Criado</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profile_permissions as $pfpermissions)
        <tr>
            <td>{{ $pfpermissions->permissions->name }}</td>
            <td>{{ $pfpermissions->profiles->name }}</td>
            <td>{{ $pfpermissions->created_at }}</td>
            <td>{{ $pfpermissions->updated_at }}</td>
            <td>
            <form action='/profile_permissions/{{$pfpermissions->id}}' method='POST'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class='btn btn-danger'>
                <i class="far fa-trash-alt"></i>
                </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
