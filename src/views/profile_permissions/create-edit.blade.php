@extends('westsoft.acl.layouts.acl')

@section('title', 'Criar permissão')

@section('css')
    <style>
        .subcategoria{
            margin-left: 30px;
            margin-top: 5px;
        }
        .categoria{
            margin-top: 30px;
            font-weight: bold;
        }
    </style>
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
                    @if (isset($profile_permissions))
                    <form method="post"
                        action="{{route('profile_permissions.update', ['id'=> $profile_permissions ->id])}}"
                        enctype="multipart/form-data">
                        {!! method_field('PUT')!!}
                        @else
                        <form action="{{route('profile_permissions.store')}}" method='post'>
                            @endif

                            {{ csrf_field() }}
                            <div class="form-body">
                                <h4 class="form-section"><i class="icon-notebook"></i> Permissões do Perfil </h4>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Selecione o perfil</label>
                                        <select name="profiles_id" class="form-control">
                                            @foreach ($profiles as $profile)
                                            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Marque as permissões do perfil</label><br>
                                        @php
                                            $categoria='INICIO';
                                            foreach ($permissions as $permission){
                                                if($categoria != substr($permission->name, 0, strpos($permission->name, '.'))){
                                                    $categoria = substr($permission->name, 0, strpos($permission->name, '.'));
                                                    echo "<input type=\"checkbox\" name=\"$categoria\"  value=\"$categoria\" class='categoria' onclick='marcardesmarcar(\"$categoria\")'><strong>Selecionar todos de  $categoria</strong> <br>";
                                                }
                                                echo "<input type='checkbox' name='permissions_id[]' class='subcategoria $categoria' value='$permission->id'>$permission->description<br>";
                                            }
                                        @endphp
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a href="{{ url('/permissions') }}"><button type="button"
                                            class="btn btn-danger mr-1">
                                            Cancelar
                                        </button></a>
                                    <button type="submit" class="btn btn-primary">
                                        {{isset($profile_permissions) ? 'Salvar alteração' : 'Salvar' }}
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
<script>
    function marcardesmarcar(classe){
        $('.'+classe).each(
            function(){
                if ($('.'+classe).prop( "checked")) 
                    $('.'+classe).attr("checked", false);
                else 
                    $('.'+classe).attr("checked", true);               
                }
        );
    }
</script>
@endsection
