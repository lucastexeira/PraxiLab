@include("layouts.cabecera")
</head>
<body>

	@include("layouts.navbar");

	<div class="about" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 text-center">
					<img src="img/team/profile-pics.jpg" class="img-fluid img-thumbnail">
					<button type="button" class="btn btn-outline-primary h4">Enviar Mensaje</button>
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
			<li class="nav-item col-lg-4">
				<a class="nav-link text-center active show" id="experiencia-tab" data-toggle="tab" href="#experiencia" role="tab" aria-controls="experiencia" aria-selected="true">Experiencia</a>
			</li>
			<li class="nav-item col-lg-4">
				<a class="nav-link text-center" id="curriculum-tab" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Currículum</a>
			</li>
			<li class="nav-item col-lg-4">
				<a class="nav-link text-center" id="calificacion-tab" data-toggle="tab" href="#calificacion" role="tab" aria-controls="calificacion" aria-selected="false">Calificación</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade active show" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="test">
							<img src="img/team/profile-pics.jpg" class="experiencia-profile-pic">
							<h2 class="experiencia-titulo">Sesión de peluqueria</h2>
						</div>
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
				<div class="container">
					<div class="curriculum">
						<div class="row">
							<div class="col-6">
								<div class="curriculum-datos">
									<h3>Fecha de nacimiento</h3>
									<p>23/05/1994</p>
								</div>
								<div class="curriculum-datos">
									<h3>Email</h3>
									<p>mail@gmail.com</p>
								</div>
								<div class="curriculum-datos">
									<h3>Profesion</h3>
									<p>Electricista</p>
								</div>
							</div>
							<div class="col-6">
								<div class="curriculum-datos">
									<h3>Dato</h3>
									<p>Lorem ipsum</p>
								</div>
								<div class="curriculum-datos">
									<h3>Dato</h3>
									<p>Lorem ipsum</p>
								</div>
								<div class="curriculum-datos">
									<h3>Dato</h3>
									<p>Lorem ipsum</p>
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
			</div>

			<div class="tab-pane fade" id="calificacion" role="tabpanel" aria-labelledby="calificacion-tab">
				<div class="container calificacion">
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