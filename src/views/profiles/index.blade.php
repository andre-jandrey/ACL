@extends('layouts.app')
@section('content')

<h1>Listagem de Profiles
    <a class='btn btn-primary' href="{{ route('profiles.create') }}">
        <i class="fas fa-plus-circle"></i> Novo
    </a>
</h1>
<table id="table_profiles" style="width:100%" class='display table table-striped table-bordered table-hover'>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Criado</th>
            <th>Info</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    </tbody>
        @foreach ($profiles as $profile)
        <tr>
            <td>{{$profile->id}}</td>
            <td>{{$profile->name}}</td>
            <td>{{$profile->created_at}}</td>
            <td>
                <a class='btn btn-success'  href="{{ route('profiles.show', $profile->id) }}" >
                    <i class="fas fa-info-circle"></i>
                </a>
            </td>
            <td>
                <form action='/profiles/{{$profile->id}}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class='btn btn-danger'>
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>
            <td>
                <a class='btn btn-warning' href="{{ route('profiles.edit', $profile->id) }}" >
                    <i class="far fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
