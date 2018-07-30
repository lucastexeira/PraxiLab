@include("layouts.cabecera")
<link href="{{asset('css/oferta.css')}}" rel="stylesheet">
<title>{{$personaAtributos->nombre}} {{$personaAtributos->apellido}} - PraxiLab</title>
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif

	<div class="about" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 text-center">
					<img src="{{asset($personaAtributos->img)}}" class="img-fluid img-thumbnail">
					@if($personaAtributos->id == $persona->id) <!--Esto es para que se oculte el boton cuando estas biendo el perdil de otro usuario-->
						<a href="{{url('editarPerfil/'.$personaAtributos->id)}}"><button type="button" class="btn btn-success btn-lg btn-purple">Editar perfil</button></a>
					@endif
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 desc">

					<p id="nombre">{{ $personaAtributos->nombre }} {{ $personaAtributos->apellido }}</p>
					<p>
						{{ $personaAtributos->descripcion }}
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item col-lg-3">
				<a class="nav-link text-center active show pestaña" id="ofertas-tab" data-toggle="tab" href="#ofertas" role="tab" aria-controls="ofertas" aria-selected="false">Ofertas</a>
			</li>
			<li class="nav-item col-lg-3">
				<a class="nav-link text-center pestaña" id="experiencia-tab" data-toggle="tab" href="#experiencia" role="tab" aria-controls="experiencia" aria-selected="true">Experiencia</a>
			</li>
			<li class="nav-item col-lg-3">
				<a class="nav-link text-center pestaña" id="curriculum-tab" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Currículum</a>
			</li>
			<li class="nav-item col-lg-3">
				<a class="nav-link text-center pestaña" id="calificacion-tab" data-toggle="tab" href="#calificacion" role="tab" aria-controls="calificacion" aria-selected="false">Calificación</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade active show" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">
				<br><a href="{{url('wizard/')}}"><button type="button" class="btn btn-success btn-lg btn-purple ">Nueva oferta de Practica</button></a>
					@foreach ($practicas as $oferta)
					<div class="panel panel-default contenido">
						<div class="panel-body">
							<div class="container-fluid">
								<div class="row align-items-start">
									<div class="col-3 text-center">
										<img src="{{asset($oferta->imagen_practica)}}" class="img-oferta-perfil" />
									</div>
									<div class="col-9">
										<h1><a href="{{url('oferta/'.$oferta->id.'')}}">{{$oferta->nombre_practica}}</a></h1>
										<p>
											{{$oferta->descripcion}}
										</p>
									</div>
								</div>
								<div class="row justify-content-end align-items-end">
									<div class="col-1">
										<p class="precio-oferta-perfil">${{$oferta->precio}}</p>
									</div>
									<div class="col-1">
										<a href="{{url('oferta/'.$oferta->id.'')}}"><button type="button" class="btn btn-success btn-lg btn-purple">Ver detalle</button></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
			</div>
			
			<div class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
				
				<div class="panel panel-default contenido">

					<div class="panel-heading">
						<h1>Estas son las evidencias de las practicas que realizo el usuario {{$personaAtributos->username}}</a></h1>
						<h2>Fue practicante en {{$CantidadPracticasPracticante}} practicas, y fue voluntario en {{$CantidadPracticasVoluntario}} practicas</h2>
					</div>

					@foreach ($experiencia as $evidencia)
						<div class="panel-body">
							<div class="container-fluid">
								<div class="row align-items-start">
									<div class="col-3 text-center">
										<a href="{{url('verEvidencia/'.$evidencia->id_historial_practica.'')}}" >
											<img src="{{asset($evidencia->pathevidencia)}}" class="img-oferta-perfil">
										</a>
									</div>
									<div class="col-9">
										<h1>Evidencias de la practica <a href="{{url('oferta/'.$evidencia->id_practica.'')}}">{{$evidencia->nombre_practica}}</a></h1>
											@foreach($usuarios as $user)
												@if($user->id == $evidencia->id_voluntario)
												<div class="usuario-oferta">
													<h1 class="experiencia-titulo">Usuario voluntario: <a href="{{url('perfil/'.$user->id.'')}}">{{$user->nombre}}</h1>
													<img src="{{ asset($user->img) }}" class="experiencia-profile-pic"></a>
												</div>
												@endif
												@if($user->id == $evidencia->id_practicante)
												<div class="usuario-oferta">
													<h1 class="experiencia-titulo">Usuario practicante: <a href="{{url('perfil/'.$user->id.'')}}">{{$user->nombre}}</h1>
													<img src="{{ asset($user->img) }}" class="experiencia-profile-pic"></a>
												</div>
												@endif

											@endforeach
										
									</div>

								</div>
								<div class="row justify-content-end align-items-end">
									<div class="col-1">
										<a href="{{url('verEvidencia/'.$evidencia->id_historial_practica.'')}}"><button type="button" class="btn btn-success btn-lg btn-purple">Ver detalle</button></a>
									</div>
								</div>
							</div>
						<hr>
						</div>

					@endforeach
				</div>
			</div>

			<div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
				<div class="container contenido">
					@if($personaAtributos->id == $persona->id) <!--Esto es para que se oculte el boton cuando estas biendo el perdil de otro usuario-->
						<a href="{{url('editarCurriculum/'.$personaAtributos->id)}}"><button type="button" class="btn btn-success btn-lg btn-purple ">Editar curriculum</button></a><br/>
					@endif

					@if (!empty($curriculum->formacion_academica))
					<div class="panel panel-default contenido">
						<div class="panel-heading">
							<h2>FORMACIÓN ACADÉMICA</h2>
						</div>
						<div class="experiencia-body panel-body">
							<p>{{ $curriculum->formacion_academica }}</p>
						</div>
					</div>
					@endif

					@if (!empty($curriculum->formacion_complementaria))
					<div class="panel panel-default contenido">
						<div class="panel-heading">
							<h2>FORMACIÓN COMPLEMENTARIA</h2>
						</div>
						<div class="experiencia-body panel-body">
							<p>{{ $curriculum->formacion_complementaria }}</p>
						</div>
					</div>
					@endif
					
					@if (!empty($curriculum->experiencia))
					<div class="panel panel-default contenido">
						<div class="panel-heading">
							<h2>EXPERIENCIA</h2>
						</div>
						<div class="experiencia-body panel-body">
							<p>{{ $curriculum->experiencia }}</p>
						</div>
					</div>
					@endif

					@if (!empty($curriculum->idiomas))
					<div class="panel panel-default contenido">
						<div class="panel-heading">
							<h2>IDIOMAS</h2>
						</div>
						<div class="experiencia-body panel-body">
							<p>{{ $curriculum->idiomas }}</p>
						</div>
					</div>
					@endif

					@if (!empty($curriculum->referencias))
					<div class="panel panel-default contenido">
						<div class="panel-heading">
							<h2>REFERENCIAS</h2>
						</div>
						<div class="experiencia-body panel-body">
							<p>{{ $curriculum->referencias }}</p>
						</div>
					</div>
					@endif

					@if (!empty($curriculum->otros_datos))
					<div class="panel panel-default contenido">
						<div class="panel-heading">
							<h2>OTROS DATOS</h2>
						</div>
						<div class="experiencia-body panel-body">
							<p>{{ $curriculum->otros_datos }}</p>
						</div>
					</div>
					@endif
				</div>
			</div>

			<div class="tab-pane fade" id="calificacion" role="tabpanel" aria-labelledby="calificacion-tab">
				<div class="container contenido">
					<span class="heading">Calificación</span>

						@if($calificacionEstrella == 1)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						@elseif($calificacionEstrella == 2)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						@elseif($calificacionEstrella == 3)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						@elseif($calificacionEstrella == 4)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
						@elseif($calificacionEstrella == 5)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
						@endif

						<p>Promedio: <span class="fa fa-star checked-purple">{{ $calificacionEstrella }} </span></p>
						
					<hr style="border:3px solid #f1f1f1">

					@foreach($comentarios as $c)
					   <ul class="list-group">
					    <li class="list-group-item">Fechas de practica: {{ $c->created_at }} <b>   Comentario del usuario <a href="{{url('perfil/'.$c->id_autor)}}">{{$c->username}}</a>: 
							<a href="{{url('verEvidencia/'.$c->id_historial_practica)}}">{{ $c->comentario }}</a></b>
							<span class="badge">{{ $c->calificacion }} <span class="fa fa-star checked-white"></span></span></li>
					  </ul>
					@endforeach
					<!--div class="row">
						<div class="side">
							<div>5 star</div>
						</div>
						<div class="middle">
							<div class="bar-container">
								<div class="bar-5"></div>
							</div>
						</div>
						<div class="side right">
							<div>150</div>
						</div>
						<div class="side">
							<div>4 star</div>
						</div>
						<div class="middle">
							<div class="bar-container">
								<div class="bar-4"></div>
							</div>
						</div>
						<div class="side right">
							<div>63</div>
						</div>
						<div class="side">
							<div>3 star</div>
						</div>
						<div class="middle">
							<div class="bar-container">
								<div class="bar-3"></div>
							</div>
						</div>
						<div class="side right">
							<div>15</div>
						</div>
						<div class="side">
							<div>2 star</div>
						</div>
						<div class="middle">
							<div class="bar-container">
								<div class="bar-2"></div>
							</div>
						</div>
						<div class="side right">
							<div>6</div>
						</div>
						<div class="side">
							<div>1 star</div>
						</div>
						<div class="middle">
							<div class="bar-container">
								<div class="bar-1"></div>
							</div>
						</div>
						<div class="side right">
							<div>20</div>
						</div>
					</div-->
				</div>
			</div>
		</div>
	</div>
	@include("layouts.pie")