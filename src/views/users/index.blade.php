@extends('westsoft.acl.layouts.acl')

@section('title', 'Perfis')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title">Usuários </h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Usuários
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content-body')
<section id="">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Zero configuration</h4> --}}

                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        <table class="table table-striped table-bordered " style="" id="table_users">
                            <thead>
                                <tr class="">
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Criado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="">
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Criado</th>
                                </tr>
                            </tfoot> 
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Zero configuration table -->

<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="voyager-trash"></i> Tem certeza de que deseja remover esta permissão?
                </h4>
            </div>
            <div class="modal-footer">
                <form action="#" id="delete_form" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sim, Remover!">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('js')

{{-- <script src="{{ asset('js/jquery.dynatable.js') }}"></script> --}}
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // $('#table_anuncios').dynatable();   
        $('#table_users').DataTable();
    });
    var deleteFormAction;
    $('td').on('click', '.delete', function (e) {
        $('#delete_form')[0].action = 'profiles/__id'.replace('__id', $(this).data('id'));
        $('#delete_modal').modal('show');
    });

</script>
@endsection
