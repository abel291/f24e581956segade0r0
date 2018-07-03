@extends('dashboard.layouts.app')
@section('title', (!$edit ? 'Crear':'Editar').' Contenido' )
@section('content')

<div class="row">
	<div class="col-lg-12 ecommerce">
		<div class="ibox float-e-margins">
			<div class="ibox-title ">
	            <h3>Contenido</h3>
	        </div> 
	        <div class="ibox-content">
	        	@include('dashboard.notificaciones.notificaciones')				

	        	{{ Form::open(['route' => ['page.update',$page->id], 'method' => 'PUT', 'files' => true, 'id' => 'details-form','class'=>'form-horizontal']) }}			

	        	<!--<div class="form-group"><label class="col-lg-2 control-label">Telefono</label>
	        		<div class="col-lg-8">
	        			<input type="text" name="phone" class="form-control" value="{{$edit? $page->phone : old('phone') }}"> 
	        		</div>
	        	</div>
	        	<div class="form-group"><label class="col-lg-2 control-label">Direccion</label>
	        		<div class="col-lg-8">
	        			<textarea rows="8" name="address" class="form-control">{{$edit? $page->address : old('address') }}</textarea> 
	        		</div>
	        	</div>
	        	<div class="form-group"><label class="col-lg-2 control-label">Mapa</label>
	        		<div class="col-lg-8">
	        			<textarea rows="8" name="map" class="form-control">{{$edit? $page->map : old('map') }}</textarea> 
	        		</div>
	        	</div>
	        	<div class="form-group"><label class="col-lg-2 control-label">Email</label>
	        		<div class="col-lg-8">
	        			<input type="text" name="email" class="form-control" value="{{$edit? $page->email : old('email') }}"> 
	        		</div>
	        	</div>-->
	        	

	        	<div class="form-group"><label class="col-lg-2 control-label">seo_title</label>
					<div class="col-lg-8">
						<input type="text" name="seo_title" class="form-control" value="{{$edit? $page->seo_title : old('seo_title') }}"> 
					</div>
				</div>
				<div class="form-group"><label class="col-lg-2 control-label">seo_desc</label>
					<div class="col-lg-8">
						<input type="text" name="seo_desc" class="form-control" value="{{$edit? $page->seo_desc : old('seo_desc') }}"> 
					</div>
				</div>
				<div class="form-group"><label class="col-lg-2 control-label">seo_keys</label>
					<div class="col-lg-8">
						<input type="text" name="seo_keys" class="form-control" value="{{$edit? $page->seo_keys : old('seo_keys') }}"> 
					</div>
				</div>
				

	        	<div class="form-group"><label class="col-lg-2 control-label">entry</label>
	        		<div class="col-lg-8">
	        			<input type="text" name="entry" class="form-control" value="{{$edit? $page->entry : old('entry') }}"> 
	        		</div>
	        	</div>
	        	<div class="form-group"><label class="col-lg-2 control-label">Descripcion</label>
	        		<div class="col-lg-8">
	        			<textarea rows="8" name="content" class="form-control" id="summernote">{{$edit? $page->content : old('content') }}</textarea>	        			
	        		</div>
	        	</div>								


	        	<div class="form-group">
	        		<label class="col-sm-2 control-label">Imagen:</label>
	        		<div class="col-sm-5">
	        			<input type="file" name="main_img" {{!$edit? 'required' :''}}  class="form-control" accept="image/png,image/jpeg,image/jpg">
	        		</div>
	        		@if($edit && $page->main_img)
	        		<div class="col-sm-2" >
	        			<button id="{{route('page.remove_image',$page->id)}}" class="btn btn-danger remover_imagen" data-toggle="modal" data-target="#modal_confirm"><i class="fa fa-trash"></i> </button>
	        		</div>
	        		@else
	        		<div class="col-sm-2" >
	        			<button class="btn btn-danger reset_file" ><i class="fa fa-trash"></i> </button>
	        		</div>
	        		@endif	        		
	        	</div>	
	        	<div class="form-group">
	        		<label class="col-sm-2 control-label">Previo</label>
	        		
	        		<div class="col-sm-7">
	        			<img src="{{$edit? $page->main_img :''}}" class="vista_previa img-responsive">
	        		</div>
	        		
	        		
	        		
	        		
	        	</div>					
	        	<div class="row" style="margin-top: 10px;">
	        		<div class="col-xs-12 text-right">
	        			<button type="submit" class="btn btn-primary">Guardar</button>
	        		</div>
	        	</div>								
	        	{{ Form::close() }}

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
<script src="{{ asset('assets/summernote/lang/summernote-es-ES.js') }}"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$('#summernote').summernote({
			'lang':'es-ES',
			
		});
       	$('.note-insert,.note-fontname').remove();
        $('.note-editable').css('font-family', "'Droid Serif'");      

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
			$('.vista_previa').attr('src', '');
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
		   		.text('Borrar Imagen')
		   		.attr('href', url)
		   		.removeClass('btn-success')
		   		.addClass('btn-danger');	   
		});

		$(document).on('click', '.remover_imagen ', function(event) {
		   		event.preventDefault();
		   		
		   		url=$(this).attr('id');
		   		$('.modal .modal-title').text('Borrar Imagen')
		   		$('.modal .modal-body').text('Desea Borrar la imagen?')
		   		$('.modal .modal-footer .btn')
		   		.text('Borrar Imagen')
		   		.attr('href', url)
		   		.removeClass('btn-success')
		   		.addClass('btn-danger');	   
		});
		$(document).on('click', '.reset_file ', function(event) {
		   		event.preventDefault();
		   		$('input[name="main_img"]').val('').trigger('change')
		   		
		   		   
		});


	
});//ready

	
</script>


        

    });
</script>
@endsection