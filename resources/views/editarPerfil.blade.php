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
			<form method="" action="{{asset('edit/'.$persona->id.'')}}">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="card-body">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input name="nombre" type="text" maxlength="50" id="nombre" class="form-control" placeholder="Nombre" value="{{ $persona->nombre }}"/>
						</div>

						<div class="form-group">
							<label for="contrasena">Apellido</label>
							<input name="apellido" type="text" id="apellido" class="form-control" placeholder="Apellido" value="{{ $persona->apellido }}" />
						</div>
						<div class="form-group">
							<label for="nombre">Mail</label>
							<input name="mail" type="mail" maxlength="50" id="mail" class="form-control" placeholder="E-mail" value="{{ $persona->mail }}"/>
						</div>
						<input name="img" type="hidden" id="img" required="required" value="img/logos/logo_default.png"/>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="zona">Localidad</label>
							<input name="zona" type="text" maxlength="50" id="zona" class="form-control" placeholder="Localidad" value="{{ $persona->zona }}"/>
						</div>
						<input name="img" type="hidden" id="img" required="required" value="img/logos/logo_default.png"/>
						<div class="form-group">
							<label for="provincia">Provincia</label>
							<input name="provincia" type="text" id="provincia" class="form-control" placeholder="Provincia" value="{{ $persona->provincia }}" />
						</div>

						<div class="form-group">
							<label for="pais">Pais</label>
							<input name="pais" type="text" id="pais" class="form-control" placeholder="Pais" value="{{ $persona->pais }}" />
						</div>
						<div class="form-group">
							<label for="telefono">Telefono</label>
							<input name="telefono" type="text" id="telefono" class="form-control" placeholder="Telefono" value="{{ $persona->telefono }}" />
						</div>
					</div>
					<input type="submit" class="btn btn-primary btn-block" value="Confirmar"/>
				</div>
			</form>
		</div>
	</div>

	@include("layouts.pie")
