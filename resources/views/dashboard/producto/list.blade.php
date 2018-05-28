@extends('dashboard.layouts.app')
@section('title', 'Productos')
@section('content')



<div class="col-lg-12">
	@include('dashboard.notificaciones.notificaciones')
	<div class="ibox float-e-margins">                   
		<div class="ibox-title text-right">
            <a href="{{route('productos.create')}}" class=""><b>Agregar Producto</b></a>
        </div>
		<div class="ibox-content">		
			<table class="table datatable table-striped table-hover">
				<thead>				
				<tr>
					<th>id</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Categoria</th>
					<th>status</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
				@foreach($productos as $producto)

				<tr>
					<td>{{$producto->id}}</td>
					<td>{{$producto->title}}</td>
					<td>{{$producto->price}}</td>					
					<td>{{$producto->quantity}}</td>					
					<td>{{$producto->category->name}}</td>
					<td class="status_proyecto">						
						<span class="label {{($producto->activo)?'label-primary':'label-warning'}}">{{$producto->activo}}</span>
					</td>
					<td>
						<div class="btn-group">
							<a class="btn-white btn btn-xs">Ver</a>
							<a href="{{route('productos.edit',$producto->id)}}" class="btn-white btn btn-xs">Editar</a>
							<a class="btn-white btn btn-xs">Eliminar</a>
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
