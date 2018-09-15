@extends('layouts.app')
@section('content')

<h1>Listagem de Usuários

</h1>
<table id="table_users" style="width:100%" class='display table table-striped table-bordered table-hover'>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Criado</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <form action='/users/{{$user->id}}' method='post'>
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

