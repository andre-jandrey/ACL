
Teste

{{-- @extends('westsoft.acl.layouts.acl')

@section('title', 'Permissões')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
<h3 class="content-header-title">Permissões <a class="btn btn-success text-bold-600" href="{{ route('permissions.create')}}">Criar Permissões</a> </h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Permissões
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content-body')




conteudo aqui



@endsection

@section('js')  

    {{-- <script src="{{ asset('js/jquery.dynatable.js') }}"></script>  --}}
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 

    <script>
    $(document).ready(function(){
        // $('#table_anuncios').dynatable();   
        $('#table_permissions').DataTable();        
    });
    var deleteFormAction;
    $('td').on('click', '.delete', function (e) {
        $('#delete_form')[0].action = 'permissions/__id'.replace('__id', $(this).data('id'));
        $('#delete_modal').modal('show');
    });
    </script>
@endsection --}}
