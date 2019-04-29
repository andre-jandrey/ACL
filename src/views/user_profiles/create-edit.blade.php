@extends('westsoft.acl.layouts.acl')

@section('title', 'Criar permissão')

@section('css')

@endsection

@section('content-body')
<!-- Ver todas as equipes -->
<div class="row justify-content-center">
    <div class="col-xl-8 col-12">
        <div class="card px-2">
            <div class="card-header">
                {{-- <h4 class="card-title">{{isset($permission) ? 'Editar permission' : 'Nova permission' }}</h4> --}}
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (isset($user_profiles))
    <form method="POST" action="{{ route('user_profiles.update', ['id'=> $user_profiles->id]) }}" >
    {!! method_field('PUT')!!}
    @else
    <form action="{{ route('user_profiles.store') }}" method='POST'>
    @endif
    @csrf
    <div class="form-body">
        <h4 class="form-section"><i class="icon-notebook"></i>Relacionar perfil a usuário</h4>
        <div class="form-group row">
            <div class="col-md-12">
            <label>Usuário</label>
            <select name="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>"
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
            <div class="col-md-12">
            <label>Perfil</label>
            <select name="profiles_id" class="form-control">
                @foreach ($profiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>"
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-actions">
            <a href="{{ url('/permissions') }}"><button type="button"
                    class="btn btn-danger mr-1">
                    Cancelar
                </button></a>
            <button type="submit" class="btn btn-primary">
                {{isset($user_profiles) ? 'Salvar alteração' : 'Salvar' }}
            </button>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
<!--/ Fim equipes -->

@endsection


@section('js')

@endsection
