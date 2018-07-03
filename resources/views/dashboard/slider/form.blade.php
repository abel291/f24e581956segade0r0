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
					<div class="form-group"><label class="col-sm-2 control-label">Link:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control"   name="href" 
							value="{{$edit? $slider->href : old('href') }}">
						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Tipo de slider:</label>
						<div class="col-sm-10">
							<select class="form-control" name="tipo">
								<option {{$edit && $slider->tipo==1?'selected':''}} value="1">Slider grande (Principal)</option>
								<option {{$edit && $slider->tipo==0?'selected':''}} value="0">Slider pequeño</option>								
							</select>
							<span class="help-block m-b-none">Solo puede haber dos slider pequeño Publicados</span>
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
						<div class="col-sm-6">
							<textarea class=" form-control" id="slider" name="content" rows="6" placeholder="TEXTO">{!!$edit? str_replace( "<br />", "", $slider->content) : old('content') !!}</textarea>

						</div>
					</div>
					<div class="form-group"><label class="col-sm-2 control-label">Color de texto:</label>
						<div class="col-sm-2">
							<input class="form-control text_color" type="text" class="form-control"   name="text_color" 
							value="{{$edit? $slider->text_color : old('text_color') }}">
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
							<input type="file" name="img" {{!$edit? 'required' :''}}  class="form-control" accept="image/png,image/jpeg,image/jpg">
						</div>
					</div>
					<div class="form-group" style="padding-top: 50px;">
						<div class="col-sm-12">
							<img src="{{$edit? $slider->img :''}}" class="vista_previa img-responsive">
						</div>
					</div>							
				</fieldset>


			</div>
		</div>							
	</div>						
</div>
			
