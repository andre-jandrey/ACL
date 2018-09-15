@extends('layouts.app')
@section('content')

<h1>Listagem de User Profiles
    <a class='btn btn-primary' href="{{ route('user_profiles.create') }}">
        <i class="fas fa-plus-circle"></i>Novo
    </a>
</h1>

<table id="table_uprofiles" style="width:100%" class='display table table-striped table-bordered table-hover'>
    <thead>
        <tr>
            <th>Usuário</th>
            <th>Perfil</th>
            <th>Criado</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user_profiles as $uprofiles)
        <tr>
            <td>{{ $uprofiles->user->name }}</td>
            <td>{{ $uprofiles->profile->name }}</td>
            <td>{{ $uprofiles->created_at }}</td>
            <td>
                <form action='/user_profiles/{{$uprofiles->id}}' method='POST'>
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
