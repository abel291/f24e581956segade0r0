@extends('dashboard.layouts.app')
@section('title', 'Users')
@section('content')



<div class="col-lg-12">
	@include('dashboard.notificaciones.notificaciones')
	<div class="ibox float-e-margins">                   
		<div class="ibox-title text-right">
            <a href="{{route('usuarios.create')}}" class=""><b>Agregar user</b></a>
        </div>
		<div class="ibox-content">		
			<table class="table datatable table-striped table-hover user_table">
				<thead>				
				<tr>
					<th>id</th>
					<th>Nombre</th>
					<th>email</th>
					<th>telefono</th>
					<th>Acciones</th>	
				</tr>
				</thead>
				<tbody>
				@foreach($users as $user)

				<tr>
					<td>{{$user->id}}</td>
					
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->phone}}</td>
					<td>
						<div class="btn-group">							
							
							<a href="{{route('usuarios.edit',$user->id)}}" class="btn-white btn btn-xs">
								Editar
							</a>							
							<a  class="btn-white btn btn-xs user" data-toggle="modal" data-target="#modal_confirm{{$user->id}}">Eliminar</a>
							
							<div class="modal fade " id="modal_confirm{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
					            <div class="modal-dialog modal-sm" role="document">
					                <div class="modal-content">
					                    <div class="modal-header">
					                    	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					                        <h5 class="modal-title" >{{$user->title}}</h5>                            
					                    </div>
					                    <div class="modal-body">
					                        Desea borrar este user
					                    </div>
					                    <div class="modal-footer">                            
					                        {{ Form::open(array('route' => ['usuarios.destroy', $user->id],'method' => 'delete')) }}
					                            <button class="btn btn-fill btn-danger" type="submit" >Borrar user</button>
					                        {{ Form::close() }}
					                    </div>
					                </div>
					            </div>
					        </div>

						</div>
                    </td>
										
				</tr>
				@endforeach
				</tbody>
			</table>

		</div>
	</div>

</div>
               
@endsection

@section('css')
<link href="{{ asset('/segade/datatables/DataTables-1.10.16/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
<script src="{{ asset('/segade/datatables/DataTables-1.10.16/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/segade/datatables/DataTables-1.10.16/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datatable').DataTable({
             "order":[[ 0, 'desc' ]],
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        
    });
</script>
@endsection
