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
					<div class="form-group"><label class="col-sm-2 control-label">Titulo:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control"   name="title" 
							value="{{$edit? $product->title : old('title') }}">
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Precio:</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="price" value="{{$edit? $product->price : old('price') }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Descripcion:</label>
						<div class="col-sm-10">
							<textarea class="input-block-level" id="summernote" name="content"  rows="18">{{$edit? $product->content : old('content') }}</textarea>
						</div>
					</div>							
				</fieldset>

			</div>
		</div>
		<div id="tab-2" class="tab-pane">
			<div class="panel-body">

				<fieldset class="form-horizontal">
					<div class="form-group"><label class="col-sm-2 control-label">Categoría:</label>
						<div class="col-sm-10">
							<select class="form-control" name="so_categories_id" required>
								<option></option>
								@foreach(App\Category::where('activo',1)->get() as $category)
								<option  value="{{$category->id}}" {{$edit && $product->so_categories_id==$category->id?'selected':''}} >{{$category->name}}</option>
								@endforeach
							</select>
							<span class="help-block m-b-none">Todo los productos ingresados recientemente estaran disponibles tambien en la seccion de <a href="{{url('/novedades')}}">novedades</a>, no es nesario crear una categoria con dicho nombre</span>
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Status:</label>
						<div class="col-sm-10">
							<select class="form-control" name="activo">
								<option {{$edit && $product->activo==1?'selected':''}} value="1">Publicada</option>
								<option {{$edit && $product->activo==0?'selected':''}} value="0">Pausada</option>
							</select>
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_title</label>
						<div class="col-lg-8">
							<input type="text" name="seo_title" class="form-control" value="{{$edit? $product->seo_title : old('seo_title') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_desc</label>
						<div class="col-lg-8">
							<input type="text" name="seo_desc" class="form-control" value="{{$edit? $product->seo_desc : old('seo_desc') }}"> 
						</div>
					</div>
					<div class="form-group"><label class="col-lg-2 control-label">seo_keys</label>
						<div class="col-lg-8">
							<input type="text" name="seo_keys" class="form-control" value="{{$edit? $product->seo_keys : old('seo_keys') }}"> 
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
									<img class="vista_previa  img_productos">									
								</td>
								<td>
									<input type="file" name="images[]" class="form-control" accept="image/png,image/jpeg,image/jpg">		
								</td>

								<td>
									<button class="btn btn-red remover_imagen"><i class="fa fa-trash"></i> </button>
								</td>
							</tr>
							<tr >
								<td class="text-center">
									<img class="vista_previa  img_productos">
								</td>
								<td>
									<input type="file" name="images[]"  class="form-control" accept="image/png,image/jpeg,image/jpg">
								</td>

								<td>
									<button class="btn btn-red remover_imagen"><i class="fa fa-trash"></i> </button>
								</td>
							</tr>
															

						</tbody>
					</table>
					@if($edit)
					<table class="table table-bordered table-stripped">
						<thead>
							<tr>
								<th>
									Imagenes Guardadas
								</th>
								<th>Imagen Principal</th>																
								
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody class="">
							@foreach($images as $img)
							<tr >
								<td class="text-center" >
									<a target="_black" href="{{$img->img}}">
										<img class="img-responsive" src="{{$img->thum}}"><br>	
									</a>								
								</td>								
								<td><label> <input type="radio" name="img_activo" value="{{$img->thum}}" 
									{{$product->img==$img->thum?'checked':''}}
									> Imagen Principal </label></td>
								<td>
									<button id="{{route('delete_img',$img->id)}}" class=" btn btn-danger btn-sm btn-fillbtn btn-red remover_imagen_bd" data-toggle="modal" data-target="#modal_confirm">
										<i class="fa fa-trash"></i> 
									</button>

								</td>
							</tr>
							@endforeach	
					</table>
					@endif
				</div>

			</div>
		</div>							
	</div>						
</div>
			
