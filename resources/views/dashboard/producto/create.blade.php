@extends('dashboard.layouts.app')
@section('title', (!$edit ? 'Crear':'Editar').' Producto' )
@section('content')
@include('dashboard.notificaciones.notificaciones')
<div class="row">
	<div class="col-lg-12 ecommerce">
		<div class="ibox float-e-margins">
			<div class="ibox-title ">
	            <h3>Producto</h3>
	        </div> 
			<div class="ibox-content">
				
				@if($edit)
				{{ Form::open(['route' => ['productos.update',$product->id], 'method' => 'PUT', 'files' => true, 'id' => 'details-form']) }}
				@else
				{{ Form::open(['route' => 'productos.store', 'method' => 'post', 'files' => true, 'id' => 'details-form']) }}
				@endif	
					@include('dashboard.producto.form')
													
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
		$(document).on('click', '.remover_imagen_bd ', function(event) {
		   		event.preventDefault();
		   		
		   		url=$(this).attr('id');
		   		$('.modal .modal-title').text('Borrar Imagen')
		   		$('.modal .modal-body').text('Desea Borrar la iamgen?')
		   		$('.modal .modal-footer .btn')
		   		.text('Borrar Imagen0 ')
		   		.attr('href', url)
		   		.removeClass('btn-success')
		   		.addClass('btn-danger');	   
		});

	
});//ready

	
</script>


        

    });
</script>
@endsection