@include("layouts.cabecera")
<link href="{{asset('css/oferta.css')}}" rel="stylesheet">
</head>
<body>

	@if(session()->has('mail'))
	@include('layouts.navbar')
	@else 
	@include('layouts.navbarSinInicio')
	@endif

	<!-- https://ajgallego.gitbooks.io/laravel-5/content/capitulo_2_formularios.html -->
	<div class="container">
		<div class="col-md-12">
			<div class="well">
              <div class="card-header"> 
                      <h1 class="text-center">Curriculum</h1>
              </div>
				<form method="" action="{{asset('editCurriculum/'.$persona->id.'')}}">
					<input type="hidden" name="_method" value="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="card-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="formacion_academica">Formación academica</label>
								
								@if (empty($curriculum->formacion_academica))
									<input name="formacion_academica" type="text" maxlength="50" id="formacion_academica" class="form-control" placeholder="Formacion academica" value=""/>
								@endif	

								@if (!empty($curriculum->formacion_academica))
									<input name="formacion_academica" type="text" maxlength="50" id="formacion_academica" class="form-control" placeholder="Formacion academica" value="{{ $curriculum->formacion_academica }}"/>
								@endif	
								
							</div>

							<div class="form-group">
								<label for="formacion_complementaria">Formación complementaria</label>
								
								@if (empty($curriculum->formacion_academica))
									<input name="formacion_complementaria" type="text" id="formacion_complementaria" class="form-control" placeholder="Formacion complementaria" value="" />
								@endif	

								@if (!empty($curriculum->formacion_academica))
									<input name="formacion_complementaria" type="text" id="formacion_complementaria" class="form-control" placeholder="Formacion complementaria" value="{{ $curriculum->formacion_complementaria }}" />
								@endif

							</div>
							<div class="form-group">
								<label for="experiencia">Experiencia</label>
								
								@if (empty($curriculum->formacion_academica))
									<input name="experiencia" type="text" maxlength="50" id="experiencia" class="form-control" placeholder="experiencia" value=""/>
								@endif	

								@if (!empty($curriculum->formacion_academica))
									<input name="experiencia" type="text" maxlength="50" id="experiencia" class="form-control" placeholder="experiencia" value="{{ $curriculum->experiencia }}"/>
								@endif
							</div>
								
							<input name="img" type="hidden" id="img" required="required" value="img/logos/logo_default.png"/>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="idiomas">Idiomas</label>

								@if (empty($curriculum->formacion_academica))
									<input name="idiomas" type="text" maxlength="50" id="idiomas" class="form-control" placeholder="Idiomas" value=""/>
								@endif	

								@if (!empty($curriculum->formacion_academica))
									<input name="idiomas" type="text" maxlength="50" id="idiomas" class="form-control" placeholder="Idiomas" value="{{ $curriculum->idiomas }}"/>
								@endif
								
							</div>
							<input name="img" type="hidden" id="img" required="required" value="img/logos/logo_default.png"/>
							<div class="form-group">
								<label for="referencias">Referencias</label>

								@if (empty($curriculum->formacion_academica))
									<input name="referencias" type="text" id="referencias" class="form-control" placeholder="Referencias" value="" />
								@endif	

								@if (!empty($curriculum->formacion_academica))
									<input name="referencias" type="text" id="referencias" class="form-control" placeholder="Referencias" value="{{ $curriculum->referencias }}" />
								@endif

							</div>

							<div class="form-group">
								<label for="otros_datos">Otros datos</label>
							
								@if (empty($curriculum->formacion_academica))
									<input name="otros_datos" type="text" id="otros_datos" class="form-control" placeholder="Otros datos" value="" />
								@endif	

								@if (!empty($curriculum->formacion_academica))
									<input name="otros_datos" type="text" id="otros_datos" class="form-control" placeholder="Otros datos" value="{{ $curriculum->otros_datos }}" />
								@endif

							</div>
						</div>
						<p>
							<input type="submit" class="btn btn-primary btn-block" value="Confirmar"/>
						</p>
					</div>
				</form>
			</div>
		</div>
	</div>

	@include("layouts.pie")
