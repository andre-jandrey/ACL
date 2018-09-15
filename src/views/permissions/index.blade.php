@extends('layouts.app')
@section('content')

<h1>Listagem de Permissões
    <a class='btn btn-primary' href="{{ route('permissions.create') }}">
        <i class="fas fa-plus-circle"></i> Novo
    </a>
</h1>
<table id="table_permissions" style="width:100%" class='display table table-striped table-bordered table-hover'>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Criado</th>
            <th>Info</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
        <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</td>
            <td>{{$permission->description}}</td>
            <td>{{$permission->created_at}}</td>
            <td>
                <a class='btn btn-success' href="{{ route('permissions.show', $permission->id) }}" >
                    <i class="fas fa-info-circle"></i>
                </a>
            </td>
            <td>
                <a class='btn btn-warning' href="{{ route('permissions.edit', $permission->id) }}" >
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action='/permissions/{{$permission->id}}' method='post'>
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

