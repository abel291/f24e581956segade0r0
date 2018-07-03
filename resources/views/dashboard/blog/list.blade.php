@extends('dashboard.layouts.app')
@section('title', 'Blog')
@section('content')



<div class="col-lg-12">
	@include('dashboard.notificaciones.notificaciones')
	<div class="ibox float-e-margins">                   
		<div class="ibox-title text-right">
            <a href="{{route('blog.create')}}" class=""><b><i class="fa fa-plus"></i> Agregar Entrada</b></a>
        </div>
		<div class="ibox-content">		
			<table class="table datatable table-striped table-hover entrada_table">
				<thead>				
				<tr>
					<th>id</th>
					<th>Titulo</th>
                    <th style="width: auto;">Entradilla</th>					
					<th>Fecha de actulizacion</th>
					<th>Acciones</th>	
				</tr>
				</thead>
				<tbody>
				@foreach($entradas as $entrada)

				<tr>
                    <td>{{$entrada->id}}</td>                   
					<td>{{$entrada->titulo}}</td>					
					<td>{{str_limit($entrada->entradilla,80)}}</td>
					<td>{{$entrada->updated_at}}</td>					
					<td>
						<div class="btn-group">							
							   
							<a href="{{route('entradas',[$entrada->category_slug,$entrada->slug])}}" class="btn-white btn btn-xs">
                                ver
                            </a>
                            <a href="{{route('blog.edit',$entrada->id)}}" class="btn-white btn btn-xs">
								Editar
							</a>							
							<a id="{{route('blog.destroy',$entrada->id)}}" class="btn-white btn btn-xs modal_delete" data-toggle="modal" data-target="#modal_delete">Eliminar</a>						
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

        $(document).on('click', '.modal_delete ', function(event) {
        	event.preventDefault();
        	url=$(this).attr('id');
            $('.modal .modal-title').text('Borrar entrada')
            $('.modal .modal-body').text('Desea Borrar la entrada?')
            $('.modal .modal-footer .btn').text('Borrar entrada')        	
        	$('.modal .modal-footer form')        	
        	.attr('action', url) 		   
        });
        
    });
</script>
@endsection
