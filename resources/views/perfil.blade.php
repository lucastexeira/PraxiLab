@include("layouts.cabecera")
<link href="{{asset('css/oferta.css')}}" rel="stylesheet">
<title>{{$persona->nombre}} {{$persona->apellido}} - PraxiLab</title>
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
					<img src="{{asset($persona->img)}}" class="img-fluid img-thumbnail">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 desc">

					<p id="nombre">{{ $persona->nombre }} {{ $persona->apellido }}</p>
					<p>
						{{ $persona->descripcion }}
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
				<div class="panel panel-default contenido">
					<div class="panel-body">
						<div class="container-fluid">
							<div class="row align-items-start">
								<div class="col-3 text-center">
									<img src="img/practicas/practica_guitarra_1.png" class="img-oferta-perfil" />
								</div>
								<div class="col-9">
									<h1>Clase de Guitarra Acústica</h1>
									<p>
										Clases de guitarra, Ukelele o audioperceptiva orientadas a que puedas disfrutar del instrumento de forma cómoda y a tus tiempos para que estés en condiciones de tocarlo frente a amigos/as o un público como solista o en una banda.
									</p>
								</div>
							</div>
							<div class="row justify-content-end align-items-end">
								<div class="col-1">
									<p class="precio-oferta-perfil">80</p>
								</div>
								<div class="col-1">
									<a href="{{url('oferta/')}}"><button type="button" class="btn btn-success btn-lg btn-purple">Ver detalle</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--div class="panel panel-default contenido">
					<div class="panel-body">
						<div class="container-fluid">
							<div class="row align-items-start">
								<div class="col-3 text-center">
									<img src="img/portfolio/port03.jpg" class="img-oferta-perfil" />
								</div>
								<div class="col-9">
									<h1>Clases de Marketing</h1>
									<p>
										Ideal para personas que desean aprender las capacidades de venta actuales
									</p>
								</div>
							</div>
							<div class="row justify-content-end align-items-end">
								<div class="col-1">
									<p class="precio-oferta-perfil">500</p>
								</div>
								<div class="col-1">
									<button type="button" class="btn btn-success btn-lg btn-purple">Ver detalle</button>
								</div>
							</div>
						</div>
					</div>
				</div-->

			</div>
			<div class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
				<div class="panel panel-default contenido">
					<div class="panel-heading">
						<img src="img/team/profile-pics.jpg" class="experiencia-profile-pic">
						<h1 class="experiencia-titulo">Clase de Guitarra Acustica</h1>
					</div>
					<div class="experiencia-body panel-body">
						<a href="verEvidencia/" >
							<img src="img/practicas/practica_guitarra_2.jpg" class="experiencia-evidencia">
						</a>
						<p class="experiencia-descripcion">
							Primera práctica de guitarra realizada con Damian Rosa.
						</p>
					</div>
					<a href="verEvidencia/" >
						<button type="button" class="btn btn-lg btn-block btn-purple btn-experiencia-perfil">Ver mas</button>
					</a>

				</div>
			</div>

			<div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
				<div class="container contenido">
					<div class="row">
						<div class="col-4">
							<div class="curriculum-datos">
								<h3>Fecha de nacimiento</h3>
								<p>23/05/1994</p>
							</div>
						</div>
						<div class="col-4">
							<div class="curriculum-datos">
								<h3>Email</h3>
								<p>{{ $persona->mail }}</p>
							</div>
						</div>
						<div class="col-4">
							<div class="curriculum-datos">
								<h3>Profesion</h3>
								<p>Electricista</p>
							</div>
						</div>
					</div>
					<div class="curriculum-datos">
						<h3>Educación</h3>
						<p><strong>Universidad Nacional de La Matanza</strong></p>
						<p>Tecnicatura en Desarrollo Web</p>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="calificacion" role="tabpanel" aria-labelledby="calificacion-tab">
				<div class="container contenido">
					<span class="heading">Calificación</span>

						@if($calificacionescomentarios > 1 and $calificacionescomentarios < 2)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						@elseif($calificacionescomentarios > 2 and $calificacionescomentarios < 3)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						@elseif($calificacionescomentarios > 3 and $calificacionescomentarios < 4)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						@elseif($calificacionescomentarios > 4 and $calificacionescomentarios < 5)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
						@else($calificacionescomentarios == 5)
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
						@endif

						<p>Promedio: {{ $calificacionescomentarios }}</p>
						
					<hr style="border:3px solid #f1f1f1">

					@foreach($comentarios as $c)
					   <ul class="list-group">
					    <li class="list-group-item">{{ $c->created_at }} <b>{{ $c->comentario }}</b> <span class="badge">{{ $c->calificacion }} </span></li>
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