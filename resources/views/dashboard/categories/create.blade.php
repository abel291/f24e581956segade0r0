@extends('dashboard.layouts.app')
@section('title', (!$edit ? 'Crear':'Editar').' Categoria' )
@section('content')

<div class="row">
	<div class="col-lg-12 ecommerce">
		<div class="ibox float-e-margins">
			<div class="ibox-title ">
	            <h3>Categoria</h3>
	        </div> 
			<div class="ibox-content">
					@include('dashboard.notificaciones.notificaciones')				
					
					@if($edit)
					{{ Form::open(['route' => ['categorias.update',$categoria->id], 'method' => 'PUT', 'files' => true, 'id' => 'details-form','class'=>'form-horizontal']) }}
					@else
					{{ Form::open(['route' => 'categorias.store', 'method' => 'post', 'files' => true, 'id' => 'details-form','class'=>'form-horizontal']) }}
					@endif				
					
					<div class="form-group"><label class="col-lg-2 control-label">Categoria</label>
						<div class="col-lg-5">
							<input type="text" name="name"  class="form-control" value="{{$edit? $categoria->name : old('name') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Color:</label>
						<div class="col-sm-2">
							<input class="form-control text_color" type="text" class="form-control" name="color" 
							value="{{$edit? $categoria->color : old('color') }}">
						</div>
					</div>

					<div class="form-group"><label class="col-lg-2 control-label">seo_title</label>
						<div class="col-lg-8">
							<input type="text" name="seo_title" class="form-control" value="{{$edit? $categoria->seo_title : old('seo_title') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_desc</label>
						<div class="col-lg-8">
							<input type="text" name="seo_desc" class="form-control" value="{{$edit? $categoria->seo_desc : old('seo_desc') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_keys</label>
						<div class="col-lg-8">
							<input type="text" name="seo_keys" class="form-control" value="{{$edit? $categoria->seo_keys : old('seo_keys') }}"> 
						</div>
					</div>
														
					<div class="form-group">
						<label class="col-sm-2 control-label">Imagen:</label>
						<div class="col-sm-5">
							<input type="file" name="img" {{!$edit? 'required' :''}}  class="form-control" accept="image/png,image/jpeg,image/jpg">
						</div>						
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-6">
							<img src="{{$edit? $categoria->img :''}}" class="vista_previa img-responsive">
						</div>
					</div>

					<div class="row" style="margin-top: 10px;">
						<div class="col-xs-12 text-right">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>								
					{{ Form::close() }}

			</div>
		</div>		
	</div>
</div>
               
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/colorpicker/css/bootstrap-colorpicker.css') }}">
@endsection


@section('js')
<script src="{{ asset('assets/colorpicker/js/bootstrap-colorpicker.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){ 
		$('.text_color').colorpicker({
		   	format:"hex",
		});

		$(document).on('change', ' input[type="file"]', function(e) {
			
			imagen=	(this.files[0].size/1024)/1024;	
			
			if ((imagen)>11) {				
				//$('#modal1').modal('open');	
				//$('.modal-content').html('<h5 class="red-text center " style="font-size:16px;"><i class="material-icons" style="font-size: 75px;">warning</i><br>Las Imagenes deben pesar menos de 2 Mb , esta imagen pesa '+imagen.toFixed(2)+' Mb</h5></div>' );
				alert('Las Imagenes deben pesar menos de 10 mb , esta imagen pesa '+imagen.toFixed(2)+' mb')		
				$(imagen).val('');
				
			}else{
				vista_previa=$('.vista_previa');
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
