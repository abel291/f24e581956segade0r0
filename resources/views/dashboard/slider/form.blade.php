{{ csrf_field() }}
<div class="tabs-container">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tab-1" > Slider info</a></li>						
		<li ><a data-toggle="tab" href="#tab-4" > Imagen</a></li>
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
					<div class="form-group"><label class="col-sm-2 control-label">Link:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control"   name="href" 
							value="{{$edit? $product->href : old('href') }}">
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Status:</label>
						<div class="col-sm-10">
							<select class="form-control" name="activo">
								<option {{$edit && $slider->activo==1?'selected':''}} value="1">Publicada</option>
								<option {{$edit && $slider->activo==0?'selected':''}} value="0">Pausada</option>
							</select>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-sm-2 control-label">Contenido imagen:</label>
						<div class="col-sm-10">
							<textarea class="input-block-level" id="summernote" name="content"  rows="18">
								{{$edit? $product->content : old('content') }}
								<h1 style="line-height: 1;te">Ofertas&nbsp;<br>en&nbsp;<br>diamantes<br></h1>
							</textarea>
						</div>
					</div>							
				</fieldset>

			</div>
		</div>					
		<div id="tab-4" class="tab-pane">
			<div class="panel-body">

				<fieldset class="form-horizontal">								
					<div class="form-group">
						<label class="col-sm-2 control-label">Imagen:</label>
						<div class="col-sm-10">
							<input type="file" name="img" required  class="form-control" accept="image/jpg,image/png">
						</div>
					</div>
					<div class="form-group" style="padding-top: 50px;">
						<div class="col-sm-12">
							<img class="vista_previa img-responsive">
						</div>
					</div>							
				</fieldset>


			</div>
		</div>							
	</div>						
</div>
			
