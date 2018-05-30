@extends('dashboard.layouts.app')
@section('title', (!$edit ? 'Crear':'Editar').' Slider' )
@section('content')

<div class="row">
	<div class="col-lg-12 ecommerce">
		<div class="ibox float-e-margins">
			<div class="ibox-title ">
	            <h3>Usuario</h3>
	        </div> 
			<div class="ibox-content">
					@include('dashboard.notificaciones.notificaciones')				
					
					@if($edit)
					{{ Form::open(['route' => ['usuarios.update',$user->id], 'method' => 'PUT', 'files' => true, 'id' => 'details-form','class'=>'form-horizontal']) }}
					@else
					{{ Form::open(['route' => 'usuarios.store', 'method' => 'post', 'files' => true, 'id' => 'details-form','class'=>'form-horizontal']) }}
					@endif				
					
					<div class="form-group"><label class="col-lg-2 control-label">Nombre</label>
						<div class="col-lg-5">
							<input type="text" name="name"  class="form-control" value="{{$edit? $user->name : old('name') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">Email</label>
						<div class="col-lg-5">
							<input type="email" name="email"  class="form-control" value="{{$edit? $user->email : old('email') }}"> 
						</div>
					</div>

					<div class="form-group"><label class="col-lg-2 control-label">Telefono</label>
						<div class="col-lg-5">
							<input type="text" name="phone"  class="form-control" value="{{$edit? $user->phone : old('phone') }}"> 
						</div>
					</div>

					<div class="form-group"><label class="col-lg-2 control-label">Contraseña</label>
						<div class="col-lg-5">
							<input type="password" name="password"  class="form-control" placeholder="{{$edit? 'dejar en blanco si no desea cambiarla':''}}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">Confirmar Contraseña</label>
						<div class="col-lg-5">
							<input type="password" name="password_confirmation"  class="form-control" placeholder="{{$edit? 'dejar en blanco si no desea cambiarla':''}}"> 
						</div>
					</div>
									
                    					
					<div class="row" style="margin-top: 10px;">
						<div class="col-xs-7 text-right">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				
				 {{ Form::close() }}
			</div>
		</div>
	</div>
</div>
               
@endsection
