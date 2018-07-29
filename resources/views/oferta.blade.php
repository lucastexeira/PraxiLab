@include("layouts.cabecera")
<link href="{{asset('css/oferta.css')}}" rel="stylesheet">
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row"> 
					<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
					<form action="{{asset('adquirirPractica/'.$historial_practicas->id.'')}}" role="form" id="formulario" class="formulario" method="">
					<input type="hidden" name="_method" value="PUT">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-md-5">
							<img class="imagen-oferta" src="{{asset($practicaPersona->imagen_practica) }}">
						</div>
						<div class="col-md-7">
							<div class="div-descripcion-corta-oferta">
								<input name="id_practica" id="id_practica" type="hidden" value="{{ $practicaPersona->practica_id }}"/>
								<h1 class="titulo-oferta">{{ $practicaPersona->nombre_practica }}</h1>
								<div class="usuario-oferta">
									
								<img src="{{asset($practicaPersona->img)}}" class="usuario-oferta-pic"> 
								<p class="nombre-usuario-oferta"><a href="{{asset('perfil/'.$practicaPersona->id_practicante.'')}}"> {{ $practicaPersona->username }}</a></p>
							
								</div>
								<div class="div-calificacion-oferta">
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
									<p class="cantidad-opiniones-oferta">2 opiniones</p>
								</div>
								<div class="div-precio-oferta">
									<p class="precio-oferta">{{ $practicaPersona->precio }}</p>
								</div>
								<div class="div-boton-oferta">
									@if(session()->has('mail'))
						                <p>
							                <button type="button" class="btn btn-lg btn-purple btn-oferta" data-toggle="modal" data-target="#myModal">		Practicar
											</button>
										</p>
						            @else 
						            	<p>
							            	<a href="{{asset('inicioSesion')}}">
								               <button type="button" class="btn btn-lg btn-purple btn-oferta">	Practicar
												</button>
											</a>
										</p>
						            @endif
								</div>

								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								      </div>
								      <div class="modal-body">
								        ¿Está seguro que desea iniciar la práctica?
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
								        <button type="submit" class="btn btn-primary">Continuar</button>
								      </div>
								    </div>
								  </div>
								</div>

							</div>
						</div>
					</form>
				</div>
				<ul class="nav nav-tabs tabs-oferta" id="myTab" role="tablist">
					<li class="nav-item col-lg-6">
						<a class="nav-link text-center active show pestaña" id="descripcion-tab" data-toggle="tab" href="#descripcion" role="tab" aria-controls="descripcion" aria-selected="false">Descripción</a>
					</li>
					<li class="nav-item col-lg-6">
						<a class="nav-link text-center pestaña" id="calificacion-tab" data-toggle="tab" href="#calificacion" role="tab" aria-controls="calificacion" aria-selected="true">Calificación</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active show" id="descripcion" role="tabpanel" aria-labelledby="descripcion-tab">
					
						<div class="contenido">
							{{ $practicaPersona->descripcion }}
						</div>
					
					</div>

					<div class="tab-pane fade" id="calificacion" role="tabpanel" aria-labelledby="calificacion-tab">
						<div class="container contenido">
								<span class="heading">Calificación</span>

									@if($promedioRedondeado == 1)
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									@elseif($promedioRedondeado == 2)
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									@elseif($promedioRedondeado == 3)
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>
									@elseif($promedioRedondeado == 4)
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star"></span>
									@elseif($promedioRedondeado == 5)
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
										<span class="fa fa-star checked-purple"></span>
									@endif

									<p>Promedio: <span class="fa fa-star checked-purple">{{ $promedioRedondeado }} </span></p>
									
								<hr style="border:3px solid #f1f1f1">

							<div class="row">
								<div class="side">
									<div>5 star</div>
								</div>
								<div class="middle">
									<div class="bar-container">
										<div class="bar-5"></div>
									</div>
								</div>
								<div class="side right">
									<div>0</div>
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
									<div>2</div>
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
									<div>0</div>
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
									<div>0</div>
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
									<div>0</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include("layouts.pie")