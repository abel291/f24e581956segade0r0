@extends('dashboard.layouts.app')
@section('title', (!$edit ? 'Crear':'Editar').' Blog' )
@section('content')

<div class="row">
	<div class="col-lg-12 ecommerce">
		<div class="ibox float-e-margins">
			<div class="ibox-title ">
	            <h3>Blog</h3>
	        </div> 
			<div class="ibox-content">
					@include('dashboard.notificaciones.notificaciones')				
					
					@if($edit)
					{{ Form::open(['route' => ['blog.update',$entrada->id], 'method' => 'PUT', 'files' => true, 'id' => 'details-form','class'=>'form-horizontal']) }}
					@else
					{{ Form::open(['route' => 'blog.store', 'method' => 'post', 'files' => true, 'id' => 'details-form','class'=>'form-horizontal']) }}
					@endif				
					
					<div class="form-group"><label class="col-lg-2 control-label">Titulo</label>
						<div class="col-lg-5">
							<input type="text" name="titulo"  class="form-control" value="{{$edit? $entrada->titulo : old('titulo') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">Entradilla</label>
						<div class="col-lg-10">
							<input type="text" name="entradilla" class="form-control" value="{{$edit? $entrada->entradilla : old('entradilla') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Categoría:</label>
						<div class="col-sm-2">
							<select class="form-control" name="so_categories_id">
								<option></option>
								@foreach(App\Category::get() as $category)
								<option  value="{{$category->id}}" {{$edit && $entrada->so_categories_id==$category->id?'selected':''}} >{{$category->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_title</label>
						<div class="col-lg-8">
							<input type="text" name="seo_title" class="form-control" value="{{$edit? $entrada->seo_title : old('seo_title') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_desc</label>
						<div class="col-lg-8">
							<input type="text" name="seo_desc" class="form-control" value="{{$edit? $entrada->seo_desc : old('seo_desc') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_keys</label>
						<div class="col-lg-8">
							<input type="text" name="seo_keys" class="form-control" value="{{$edit? $entrada->seo_keys : old('seo_keys') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Status:</label>
						<div class="col-sm-2">
							<select class="form-control" name="activo">
								<option {{$edit && $entrada->activo==1?'selected':''}} value="1">Publicada</option>
								<option {{$edit && $entrada->activo==0?'selected':''}} value="0">Pausada</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Descripcion:</label>
						<div class="col-sm-10">
							<textarea class="input-block-level" id="summernote" name="contenido" rows="18">{{$edit? $entrada->contenido : old('contenido') }}</textarea>
						</div>
					</div>									
                    					
														
					<div class="form-group">
						<label class="col-sm-2 control-label">Imagen:</label>
						<div class="col-sm-5">
							<input type="file" name="main_img" {{!$edit? 'required' :''}}  class="form-control" accept="image/png,image/jpeg,image/jpg">
						</div>
						<div class="col-sm-4">
							<img src="{{$edit? $entrada->main_img :''}}" class="vista_previa img-responsive">
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
			var content = $('textarea[name="contenido"]').html($('#summernote').code());
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
		$(document).on('click', '.remover_imagen_bd ', function(event) {
		   		event.preventDefault();		   		
		   		url=$(this).attr('id');
		   		$('.modal .modal-title').text('Borrar Imagen')
		   		$('.modal .modal-body').text('Desea Borrar la imagen?')
		   		$('.modal .modal-footer .btn')
		   		.text('Borrar Imagen ')
		   		.attr('href', url)
		   		.removeClass('btn-success')
		   		.addClass('btn-danger');	   
		});

	
});//ready

	
</script>


        

    });
</script>
@endsection
