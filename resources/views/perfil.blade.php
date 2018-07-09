@include("layouts.cabecera")
</head>
<body>

	@include("layouts.navbar")

	<div class="about" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 text-center">
					<img src="img/team/profile-pics.jpg" class="img-fluid img-thumbnail">
					<button type="button" class="btn btn-outline-primary h4">
						<a href=" {{ 'abmPractica' }} ">Nueva Practica
					</button>
					<button type="button" class="btn btn-outline-primary h4">
						<a href=" {{ 'listadoPracticasEstados' }} ">Listado de mis Practicas
					</button>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 desc">

					<p id="nombre">Lucas Texeira</p>
					<p>
						ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
				<div class="panel panel-default contenido">
					<div class="panel-body">
						<div class="container-fluid">
							<div class="row align-items-start">
								<div class="col-3 text-center">
									<img src="img/portfolio/port04.jpg" class="img-oferta-perfil" />
								</div>
								<div class="col-9">
									<h1>Clase de guitarra</h1>
									<p>
										Capital Federal
									</p>
								</div>
							</div>
							<div class="row justify-content-end align-items-end">
								<div class="col-1">
									<p class="precio-oferta-perfil">1000</p>
								</div>
								<div class="col-1">
									<button type="button" class="btn btn-success btn-lg btn-purple">Practicar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default contenido">
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
									<button type="button" class="btn btn-success btn-lg btn-purple">Practicar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
				<div class="panel panel-default contenido">
					<div class="panel-heading">
						<img src="img/team/profile-pics.jpg" class="experiencia-profile-pic">
						<h1 class="experiencia-titulo">Sesión de peluqueria</h1>
					</div>
					<div class="experiencia-body panel-body">
						<img src="img/portfolio/port01.jpg" class="experiencia-evidencia">
						<img src="img/portfolio/port02.jpg" class="experiencia-evidencia">
						<p class="experiencia-descripcion">
							ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
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
								<p>mail@gmail.com</p>
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
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star"></span>
					<p>Promedio: 4.1 basado en 25 reviews.</p>
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
					</div>
				</div>
			</div>
		</div>
	</div>
<footer>
@include("layouts.pie")