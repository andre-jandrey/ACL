@extends('westsoft.acl.layouts.acl')

@section('title', 'Perfis')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
<h3 class="content-header-title">Perfis <a class="btn btn-success text-bold-600" href="{{ route('profiles.create')}}">Criar Perfil</a> </h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Perfis
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
                        
                        <table class="table table-striped table-bordered " style="" id="table_profiles">
                            <thead>
                                <tr class="">                               
                                    <th>Perfis</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $c)
                                    <tr>
                                        <td style="font-weight: 600"> {{ $c->name }} </td>
                                        <td>{{ $c->description }}</td>
                                        <td> 
                                            <a href="{{ route('profiles.edit', $c->id) }}" title="Editar" class="btn btn-sm btn-primary  edit">
                                                <i class="icon-pencil"></i> <span class="hidden-xs hidden-sm">Editar</span>
                                            </a> 
                                            <a href="javascript:;" title="Remover" class="btn btn-sm btn-danger  delete" data-id="{{ $c->id}}" id="delete-2">
                                                <i class="icon-trash"></i> <span class="hidden-xs hidden-sm">Remover</span>
                                            </a>
                                        </td>
                                    </tr>  
                                @endforeach                            
                            </tbody>
                            <!-- <tfoot>
                                <tr class="">                               
                                    <th>Codigo</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Tipo</th>
                                </tr>
                            </tfoot> -->
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="voyager-trash"></i> Tem certeza de que deseja remover este perfil?</h4>
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

    {{-- <script src="{{ asset('js/jquery.dynatable.js') }}"></script>  --}}
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 

    <script>
    $(document).ready(function(){
        // $('#table_anuncios').dynatable();   
        $('#table_profiles').DataTable();        
    });
    var deleteFormAction;
    $('td').on('click', '.delete', function (e) {
        $('#delete_form')[0].action = 'profiles/__id'.replace('__id', $(this).data('id'));
        $('#delete_modal').modal('show');
    });
    </script>
@endsection
