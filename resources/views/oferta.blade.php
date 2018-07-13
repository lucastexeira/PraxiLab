@include("layouts.cabecera")
</head>
<body>

	@include("layouts.navbar")

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-5">
						<img class="imagen-oferta" src="img/portfolio/port03.jpg">
					</div>
					<div class="col-md-7">
						<div class="div-descripcion-corta-oferta">
							<h1 class="titulo-oferta">Clases de Marketing</h1>
							<div class="usuario-oferta">
								<img src="img/team/profile-pics.jpg" class="usuario-oferta-pic">
								<p class="nombre-usuario-oferta">Lucas Texeira</p>
								<a href="#calificacion-tab">test</a>
							</div>
							<div class="div-calificacion-oferta">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<p class="cantidad-opiniones-oferta">2 opiniones</p>
							</div>
							<div class="div-boton-oferta">
								<button type="button" class="btn btn-lg btn-purple btn-oferta">Practicar</button>
							</div>

						</div>
					</div>
				</div>
				<ul class="nav nav-tabs tabs-oferta" id="myTab" role="tablist">
					<li class="nav-item col-lg-6">
						<a class="nav-link text-center active show pestaña" id="descripcion-tab" data-toggle="tab" href="#descripcion" role="tab" aria-controls="descripcion" aria-selected="false">Descripcion</a>
					</li>
					<li class="nav-item col-lg-6">
						<a class="nav-link text-center pestaña" id="calificacion-tab" data-toggle="tab" href="#calificacion" role="tab" aria-controls="calificacion" aria-selected="true">Calificacion</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active show" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
						texto
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
</div>

@include("layouts.pie")