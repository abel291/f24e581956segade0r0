@php $categories=[] @endphp

@extends('layouts.app')

@section('title', 'Error')

@section('content')

<div class="error-page container-fluid">
	<!-- Container -->
	<div class="container">
		<div class="error-page-content">
			<h2>404</h2>
			<h3>error - Pagina no encotrada</h3>
			<p>
				Parece que no podemos encontrar lo que estás buscando. Tal vez una búsqueda rapida te puede ayudar o volver a la <a href="{{route('home')}}"> Página de inicio. </a>
			</p>
		</div>
		<div class="col-md-5 col-sm-6">
			<form action="{{route('search')}}" method="get">
			<div class="input-group">
				<input type="text" class="form-control" value="" name="search" placeholder="Buscar Producto">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-search" title="Buscar" type="button"><i class="icon_search"></i></button>
				</span>
			</div>
			</form>
		</div>
	</div><!-- Container /- -->
</div>

@stop
