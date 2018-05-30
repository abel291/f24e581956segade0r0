@extends('dashboard.layouts.app')
@section('title', 'Apartados')
@section('content')

<div class="col-lg-12">
	@include('dashboard.notificaciones.notificaciones')
	<div class="ibox float-e-margins">                   
		<div class="ibox-title ">
            <b>Pedidos Recientes</b>
        </div>
		<div class="ibox-content">	
			<div class="col-sm-4">
				<input width="300" type="text" class="form-control  m-b-xs" id="filter" placeholder="Buscar">
			</div>

			<table class="table reserver_table table-striped table-hover toggle-arrow-tiny" data-page-size="20" data-filter=#filter>

				<thead>				
				<tr>
					<th data-hide="all" >id</th>
					<th data-hide="all">Nombre </th>
					<th data-hide="all">Email</th>
					<th data-hide="all">Telefono</th>
					<th data-toggle="true">Articulo</th>
					<th >Precio</th>
					<th data-hide="all">Monto a pagar</th>
					<th>Cantidad solicitada</th>
					<th data-hide="all">Categoria</th>
					<th data-hide="all">Nota de cliente</th>
					<th>status</th>
					<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
				@foreach($products as $product)

				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->user_name}}</td>
					<td>{{$product->user_email}}</td>
					<td>{{$product->user_phone}}</td>
					<td><a target="_black" href="{{route('product',[$product->category,$product->slug])}}">{{$product->title}}</a></td>
					<td>{{$product->price}}</td>
					<td>€{{ number_format($product->price,2) }} x {{ $product->quantity }} =
					{{ number_format($product->price*$product->quantity,2) }}</td>					
					<td>{{$product->quantity}}</td>					
					<td>{{$product->category}}</td>
					<td>{{$product->note}}</td>
					<td class="status_proyecto">
						@if($product->status==0)
                            <span class="label label-default">SIN APARTAR</span>
                        @elseif($product->status==1)
                            <span class="label label-warning">APARTADO</span>
                        @elseif($product->status==2)
                            <span class="label label-success">ENTREGADO</span>
                        @elseif($product->status==3)
                            <span class="label label-danger">RECHAZADA</span>
                        @endif
					</td>

					<td class="footable_btn">
						<div class="btn-group">
							<a target="_black" href="{{route('product',[$product->category,$product->slug])}}" class="btn-white btn btn-xs">
								Ver Producto
							</a>
							<button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" aria-expanded="false">Cambiar status <span class="caret"></span></button>
							<ul class="dropdown-menu">
                                <li>
                                	<a href="{{route('statu_reserved',[$product->id,2])}}">
                                	<span class="label label-success">ENTREGADO</span>
                                	</a>
                                </li>
                                <li>
                                	<a href="{{route('statu_reserved',[$product->id,3])}}">
                                		<span class="label label-danger">RECHAZADO</span>
		                            </a>
		                        </li>                                
                                <!--<li class="divider"></li>
                                <li><a href="#"><i class="fa fa-trash"></i> Remover pedido </a></li>-->
                            </ul>							
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
<link href="{{asset('assets/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
@endsection
@section('js')
<script src="{{ asset('assets/js/plugins/footable/footable.all.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {

            $('.reserver_table').footable();
            
    });
</script>
@endsection

