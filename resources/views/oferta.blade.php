@include("layouts.cabecera")
<link href="{{asset('css/oferta.css')}}" rel="stylesheet">
</head>
<body>

	@include("layouts.navbar")

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-5">
						<img class="imagen-oferta" src="img/practicas/practica_guitarra_1.png">
					</div>
					<div class="col-md-7">
						<div class="div-descripcion-corta-oferta">
							<h1 class="titulo-oferta">Clases de Guitarra Acustica</h1>
							<div class="usuario-oferta">
								<img src="img/team/profile-pics.jpg" class="usuario-oferta-pic">
								<p class="nombre-usuario-oferta">Lucas Texeira</p>
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
								<p class="precio-oferta">$80</p>
							</div>
							<div class="div-boton-oferta">
								<button type="button" class="btn btn-lg btn-purple btn-oferta">Practicar</button>
							</div>

						</div>
					</div>
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
							Clases de guitarra, Ukelele o audioperceptiva orientadas a que puedas disfrutar del instrumento de forma cómoda y a tus tiempos para que estés en condiciones de tocarlo frente a amigos/as o un público como solista o en una banda.
						</div>
					</div>
					<div class="tab-pane fade" id="calificacion" role="tabpanel" aria-labelledby="calificacion-tab">
						<div class="container contenido">
							<span class="heading">Calificación</span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<p>Promedio: 4 basado en 2 reviews.</p>
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