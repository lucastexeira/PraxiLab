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
			<form method="" action="{{asset('editCurriculum/'.$persona->id.'')}}">
				<input type="hidden" name="_method" value="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="card-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="formacion_academica">Formación academica</label>
							<input name="formacion_academica" type="text" maxlength="50" id="formacion_academica" class="form-control" placeholder="Formacion academica" value="{{ $curriculum->formacion_academica }}"/>
						</div>

						<div class="form-group">
							<label for="formacion_complementaria">Formación complementaria</label>
							<input name="formacion_complementaria" type="text" id="formacion_complementaria" class="form-control" placeholder="Formacion complementaria" value="{{ $curriculum->formacion_complementaria }}" />
						</div>
						<div class="form-group">
							<label for="experiencia">Experiencia</label>
							<input name="experiencia" type="text" maxlength="50" id="experiencia" class="form-control" placeholder="experiencia" value="{{ $curriculum->experiencia }}"/>
						</div>
						<input name="img" type="hidden" id="img" required="required" value="img/logos/logo_default.png"/>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="idiomas">Idiomas</label>
							<input name="idiomas" type="text" maxlength="50" id="idiomas" class="form-control" placeholder="Idiomas" value="{{ $curriculum->idiomas }}"/>
						</div>
						<input name="img" type="hidden" id="img" required="required" value="img/logos/logo_default.png"/>
						<div class="form-group">
							<label for="referencias">Referencias</label>
							<input name="referencias" type="text" id="referencias" class="form-control" placeholder="Referencias" value="{{ $curriculum->referencias }}" />
						</div>

						<div class="form-group">
							<label for="otros_datos">Otros datos</label>
							<input name="otros_datos" type="text" id="otros_datos" class="form-control" placeholder="Otros datos" value="{{ $curriculum->otros_datos }}" />
						</div>
					</div>
					<input type="submit" class="btn btn-primary btn-block" value="Confirmar"/>
				</div>
			</form>
		</div>
	</div>

	@include("layouts.pie")
