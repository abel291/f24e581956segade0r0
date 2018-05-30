@extends('dashboard.layouts.app')

@section('title', '')

@section('content')
<div class="row">	
	<div class="col-lg-3">
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
	<div class="col-lg-3">
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
	<div class="col-lg-3">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<span class="label label-danger pull-right">Usuarios</span>
				<h5>Usuarios registrados</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">{{count($users)}}</h1>
				
				<small>Todos</small>
			</div>
		</div>
	</div>
@stop