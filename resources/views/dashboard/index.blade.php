@extends('dashboard.layouts.app')

@section('title', 'Home')

@section('content')
<div class="row">
	<div class="col-lg-9">
		<div class="col-lg-7">
	    	<div class="ibox float-e-margins">
	    		<div class="ibox-title">
	    			<h5>Ultimos Productos regitrados</h5>                        
	    		</div>
	    		<div class="ibox-content">

	    			<table class="table">
	    				<thead>
	    					<tr>
	    						<th>#</th>
	    						<th>Nombre</th>
	    						<th>Precio</th>                                
	    						<th>Fecha</th>                                
	    					</tr>
	    				</thead>
	    				<tbody>
	    					@foreach($products->sortByDesc('id')->take(6) as $product)
	    					<tr>
	    						<td>{{$product->id}}</td>
	    						<td>{{$product->title}}</td>
	    						<td>{{$product->price}}</td>                                
	    						<td>{{$product->updated_at}}</td>                                
	    					</tr>
	    					@endforeach

	    				</tbody>
	    			</table>

	    		</div>
	    	</div>
	    </div>
	    <div class="col-lg-5">
	    	<div class="ibox float-e-margins">
	    		<div class="ibox-title">
	    			<h5>Ultimos Usuario regitrados</h5>                        
	    		</div>
	    		<div class="ibox-content">

	    			<table class="table">
	    				<thead>
	    					<tr>
	    						<th>#</th>
	    						<th>Nombre</th>
	    						<th>Email</th>                                
	    					</tr>
	    				</thead>
	    				<tbody>
	    					@foreach($users->sortByDesc('id')->take(6) as $user)
	    					<tr>
	    						<td>{{$user->id}}</td>
	    						<td>{{$user->name}}</td>
	    						<td>{{$user->email}}</td>                                
	    					</tr>
	    					@endforeach

	    				</tbody>
	    			</table>

	    		</div>
	    	</div>
	    </div>
	    <div class="col-lg-12">
	    	<div class="ibox float-e-margins">
	    		<div class="ibox-title">
	    			<h5>Ultimos Usuario regitrados</h5>                        
	    		</div>
	    		<div class="ibox-content">

	    			<table class="table">
	    				<thead>
	    					<tr>
	    						<th>#</th>
	    						<th>Nombre</th>
	    						<th>Email</th>                                
	    					</tr>
	    				</thead>
	    				<tbody>
	    					@foreach($users->sortByDesc('id')->take(6) as $user)
	    					<tr>
	    						<td>{{$user->id}}</td>
	    						<td>{{$user->name}}</td>
	    						<td>{{$user->email}}</td>                                
	    					</tr>
	    					@endforeach

	    				</tbody>
	    			</table>

	    		</div>
	    	</div>
	    </div>
	</div>
	<div class="col-lg-3">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-info pull-right">Totales</span>
					<h5>Reservados</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count($reserved)}}</h1>
					
					<small>En total</small>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-primary pull-right">Totales ingresados</span>
					<h5>Productos</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count($products)}}</h1>				
					
				</div>
			</div>
		</div>
		
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Productos registrados (Por Categoria)</h5>					
				</div>
				<div class="ibox-content">
					<div class="flot-chart">
						<div class="flot-chart-pie-content" id="flot-pie-chart"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@stop
@section('css')
<style type="text/css">
	.flot-chart .legend >div ,.flot-chart .legend > table{
		right: -40px!important;

	}
</style>
@endsection
@section('js')
<script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
 	<script src="{{ asset('assets/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flot/jquery.flot.time.js') }}"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
	var data = [
		@foreach($chart as $key => $value)
		{
	        label: "{{$value[0]}} ({{$value[1]}})",
	        data: {{$value[1]}},
	        color: "{{$value[2]}}",
	    }, 
	    @endforeach
	    
    ];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });
});
</script>
@endsection