@extends('dashboard.layouts.app')
@section('title', 'Crear Producto')
@section('content')
@include('dashboard.notificaciones.notificaciones')
<div class="row">
	<div class="col-lg-12 ecommerce">
		<div class="ibox float-e-margins">
			<div class="ibox-title ">
	            <h3>Producto</h3>
	        </div> 
			<div class="ibox-content">
				<form  action="{{route('productos.store')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="tabs-container">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab-1" > Producto info</a></li>
							<li class=""><a data-toggle="tab" href="#tab-2"> Datos</a></li>				
							<li ><a data-toggle="tab" href="#tab-4" > Imagenes</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab-1" class="tab-pane active">
								<div class="panel-body">

									<fieldset class="form-horizontal">
										<div class="form-group"><label class="col-sm-2 control-label">Nombre:</label>
											<div class="col-sm-10">
												<input type="text" class="form-control"   name="nombre" value="{{ old('nombre') }}">
											</div>
										</div>
										<div class="form-group"><label class="col-sm-2 control-label">Precio:</label>
											<div class="col-sm-10">
												<input type="number" class="form-control" name="precio" value="{{old('precio')}}">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Descripcion:</label>
											<div class="col-sm-10">
												<textarea class="input-block-level" id="summernote" name="descripcion"  rows="18">{{old('descripcion')}}</textarea>
											</div>
										</div>							
									</fieldset>

								</div>
							</div>
							<div id="tab-2" class="tab-pane">
								<div class="panel-body">

									<fieldset class="form-horizontal">							
										<div class="form-group"><label class="col-sm-2 control-label">Marca:</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="marca" value="{{old('marca')}}">
											</div>
										</div>
										<div class="form-group"><label class="col-sm-2 control-label">Modelo:</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="modelo" value="{{old('modelo')}}">
											</div>
										</div>							
										<div class="form-group"><label class="col-sm-2 control-label">Cantidad:</label>
											<div class="col-sm-10">
												<input type="number" class="form-control" name="cantidad" value="{{old('cantidad')}}">
											</div>
										</div>
										<div class="form-group"><label class="col-sm-2 control-label">Cantidad Minima:</label>
											<div class="col-sm-10">
												<input type="number" class="form-control" name="cantidad_min" value="{{old('cantidad_min')}}">
											</div>
										</div>
										
										<div class="form-group"><label class="col-sm-2 control-label">Status:</label>
											<div class="col-sm-10">
												<select class="form-control" name="status">
													<option value="publicada">Publicada</option>
													<option value="pausada">Pausada</option>
												</select>
											</div>
										</div>
									</fieldset>


								</div>
							</div>				
							<div id="tab-4" class="tab-pane">
								<div class="panel-body">

									<div class="table-responsive">
										<table class="table table-bordered table-stripped">
											<thead>
												<tr>
													<th>
														Vista previa
													</th>
													<th>
														Agregar Imagen
													</th>										
													<th>
														opciones
													</th>
													<th><button class="btn btn-primary agregar_imagen"><b>+</b></button></th>
												</tr>
											</thead>
											<tbody class="clone_imagen">
												<tr style="display: none;">
													<td class="text-center">
														<img class="vista_previa img-responsive img_productos">
													</td>
													<td>
														<input type="file" name="imagenes[]" class="form-control" accept="image/jpg,image/png">
													</td>
													
													<td>
														<button class="btn btn-red remover_imagen"><i class="fa fa-trash"></i> </button>
													</td>
												</tr>
												<tr >
													<td class="text-center">
														<img class="vista_previa img-responsive img_productos">
													</td>
													<td>
														<input type="file" name="imagenes[]"  class="form-control" accept="image/jpg,image/png">
													</td>
													
													<td>
														<button class="btn btn-red remover_imagen"><i class="fa fa-trash"></i> </button>
													</td>
												</tr>									
												
											</tbody>
										</table>
									</div>

								</div>
							</div>							
						</div>
						
					</div>
				
				<div class="row" style="margin-top: 10px;">
					<div class="col-xs-12 text-right">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
               
@endsection
@section('css')
	<link href="{{asset('assets/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">

    <style type="text/css">

    </style>
@endsection
@section('js')
<script src="{{ asset('assets/js/plugins/summernote/summernote.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){

        $('#summernote').summernote();
        var postForm = function() {
			var content = $('textarea[name="descripcion"]').html($('#summernote').code());
		}

        $('.note-insert').remove();
        $(document).on('click', '.agregar_imagen', function(event) {
			event.preventDefault();
			console.log('on')
			clone=$('.clone_imagen tr:first').clone(true);
			$('.clone_imagen').append(clone.show());		
						
		});
		$(document).on('click', '.remover_imagen', function(event) {				
			$(this).closest('tr').remove();				
		});
		$(document).on('change', ' input[type="file"]', function(e) {
			
			imagen=	(this.files[0].size/1024)/1024;	
			
			if ((imagen)>11) {				
				//$('#modal1').modal('open');	
				//$('.modal-content').html('<h5 class="red-text center " style="font-size:16px;"><i class="material-icons" style="font-size: 75px;">warning</i><br>Las Imagenes deben pesar menos de 2 Mb , esta imagen pesa '+imagen.toFixed(2)+' Mb</h5></div>' );
				alert('Las Imagenes deben pesar menos de 10 mb , esta imagen pesa '+imagen.toFixed(2)+' mb')		
				$(imagen).val('');
				
			}else{
				vista_previa=$(this).closest('tr').find('.vista_previa');

				var file = e.target.files[0],
		      	imageType = /image.*/;
		    
		      	if (!file.type.match(imageType))
		       		return;
		  
		      	var reader = new FileReader();
		      	reader.onload = fileOnload;
		      	reader.readAsDataURL(file);		     
		  
		     	function fileOnload(e) {
		      		var result=e.target.result;
		      		vista_previa.attr("src",result);
		     	}
		 	}
		});
});//ready

	
</script>


        

    });
</script>
@endsection