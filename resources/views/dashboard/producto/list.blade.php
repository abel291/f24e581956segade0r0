@extends('dashboard.layouts.app')
@section('title', 'Productos')
@section('content')



<div class="col-lg-12">
	@include('dashboard.notificaciones.notificaciones')
	<div class="ibox float-e-margins">                   
		<div class="ibox-title text-right">
			<h5>Productos</h5>
            <div class="ibox-tools">
                <a style="color: #337ab7;" href="{{route('productos.create')}}" class=""><b> <i class="fa fa-plus"></i> Agregar Producto</b></a>
            </div>
            
        </div>
		<div class="ibox-content">		
			<table class="table datatable table-striped table-hover">
				<thead>				
				<tr>
					<th>id</th>
					<th>Img</th>
					<th>Nombre</th>					
					<th>Precio</th>
					<th>Categoria</th>
					<th>status</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
				@foreach($products as $product)

				<tr>
					<td>{{$product->id}}</td>
					<td class="slider_img"><img src="{{$product->img}}" class="img-responsive slider_img_list"></td>					
					<td>{{$product->title}}</td>
					<td>{{number_format($product->price,2)}}€ </td>					
							
					<td>{{$product->category->name}}</td>
					<td class="status_proyecto">
						@if($product->activo)					
						<span class="label label-primary">ACTIVO</span>
						@else
						<span class="label label-warning">DESACTIVO</span>
						@endif
					</td>
					<td>
						<div class="btn-group">
							<a target="_black" href="{{route('product',[$product->category->name,$product->slug])}}" class="btn-white btn btn-xs">
								Ver
							</a>
							
							<a href="{{route('productos.edit',$product->id)}}" class="btn-white btn btn-xs">
								Editar
							</a>							
							<a id="{{route('productos.destroy',$product->id)}}" class="btn-white btn btn-xs remover_product" data-toggle="modal" data-target="#modal_confirm{{$product->id}}">Eliminar</a>
							
							<div class="modal fade " id="modal_confirm{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
					            <div class="modal-dialog modal-sm" role="document">
					                <div class="modal-content">
					                    <div class="modal-header">
					                    	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					                        <h5 class="modal-title" >{{$product->title}}</h5>                            
					                    </div>
					                    <div class="modal-body">
					                        Desea borrar este producto
					                    </div>
					                    <div class="modal-footer">                            
					                        {{ Form::open(array('route' => ['productos.destroy', $product->id],'method' => 'delete')) }}
					                            <button class="btn btn-fill btn-danger" type="submit" >Borrar Poducto</button>
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
