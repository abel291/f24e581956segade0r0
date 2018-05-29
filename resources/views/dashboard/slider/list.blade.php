@extends('dashboard.layouts.app')
@section('title', 'Sliders')
@section('content')



<div class="col-lg-12">
	@include('dashboard.notificaciones.notificaciones')
	<div class="ibox float-e-margins">                   
		<div class="ibox-title text-right">
            <a href="{{route('slider.create')}}" class=""><b>Agregar Slider</b></a>
        </div>
		<div class="ibox-content">		
			<table class="table datatable table-striped table-hover slider_table">
				<thead>				
				<tr>
					<th>id</th>
					<th>img</th>
					<th>Titulo</th>
					<th>Link</th>
					<th>Descripcion</th>					
					<th>status</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
				@foreach($sliders as $slider)

				<tr>
					<td>{{$slider->id}}</td>
					<td class="slider_img"><a target="_black" href="{{$slider->img}}"><img src="{{$slider->img}}" class="img-responsive slider_img_list"></a></td>
					<td>{{$slider->title}}</td>
					<td>{{$slider->href}}</td>
					<td>{{$slider->description}}</td>								
					<td>
						@if($slider->activo)					
						<span class="label label-primary">Publicada</span>
						@else
						<span class="label label-warning">Pausada</span>
						@endif
					</td>
					<td ><a href="{{$slider->description}}">{{$slider->description}}</a></td>					
					
					<td>
						<div class="btn-group">							
							
							<a href="{{route('slider.edit',$slider->id)}}" class="btn-white btn btn-xs">
								Editar
							</a>							
							<a id="{{route('slider.destroy',$slider->id)}}" class="btn-white btn btn-xs slider" data-toggle="modal" data-target="#modal_confirm{{$slider->id}}">Eliminar</a>
							
							<div class="modal fade " id="modal_confirm{{$slider->id}}" tabindex="-1" role="dialog" aria-hidden="true">
					            <div class="modal-dialog modal-sm" role="document">
					                <div class="modal-content">
					                    <div class="modal-header">
					                    	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					                        <h5 class="modal-title" >{{$slider->title}}</h5>                            
					                    </div>
					                    <div class="modal-body">
					                        Desea borrar este slider
					                    </div>
					                    <div class="modal-footer">                            
					                        {{ Form::open(array('route' => ['slider.destroy', $slider->id],'method' => 'delete')) }}
					                            <button class="btn btn-fill btn-danger" type="submit" >Borrar Slider</button>
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
