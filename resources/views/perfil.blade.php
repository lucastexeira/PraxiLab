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
				<a class="nav-link text-center active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Experiencia</a>
			</li>
			<li class="nav-item col-lg-4">
				<a class="nav-link text-center" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Currículum</a>
			</li>
			<li class="nav-item col-lg-4">
				<a class="nav-link text-center" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Calificación</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
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
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="row">
					<div class="col-5">
						<div class="calificacion text-center">
							<b><p id="promedio">4.5</p></b>
						</div>
					</div>
					<div class="col-7">
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">1</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">1</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">0</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">0</div>
						</div>
						<div class="pull-left">
							<div class="pull-left" style="width:35px; line-height:1;">
								<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
							</div>
							<div class="pull-left" style="width:180px;">
								<div class="progress" style="height:9px; margin:8px 0;">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
										<span class="sr-only">80% Complete (danger)</span>
									</div>
								</div>
							</div>
							<div class="pull-right" style="margin-left:10px;">0</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include("layouts.pie")