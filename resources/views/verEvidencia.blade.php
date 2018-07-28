@include("layouts.cabecera")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<link rel="stylesheet" href="gallery-clean.css">
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif


	<div class="container gallery-container">
		<div class="panel panel-default contenido">
			<div class="panel-heading">
				<a href="oferta/">
					<h1 class="experiencia-titulo">Práctica: {{$nombrePractica}}</h1>
				</a>
			</div>
			<div class="experiencia-body panel-body">
				<div class="tz-gallery">

					<div class="row">

						<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
								<a class="lightbox" href="{{asset('$imagenEvidencia')}}">
									<img src="{{asset('$imagenEvidencia')}}" >
								</a>
							</div>
						</div>

					</div>

				</div>

				
				<div class="row">

					<div class="center-block nav-item col-lg-5 col-lg-offset-1">
						<h1>Calificación al voluntario</h1>
						<div class="form-group"  width="50%" >
							<span class="fa fa-star checked-orange"></span>
							<span class="fa fa-star checked-orange"></span>
							<span class="fa fa-star checked-orange"></span>
							<span class="fa fa-star checked-orange"></span>
							<span class="fa fa-star"></span>
							4
						</div>
						<div class="form-group">
							<br>
							<h1>Comentario</h1>
							<p>
								ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							</p>
						</div>
					</div>

					<div class="center-block nav-item col-lg-5 col-lg-offset-1">
						<h1>Calificación al practicante</h1>
						<div class="form-group"  width="50%" >
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star checked-purple"></span>
							<span class="fa fa-star"></span>
							4
						</div>
						<div class="form-group">
							<br>
							<h1>Comentario</h1>
							<p>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
	<script>
		baguetteBox.run('.tz-gallery');
	</script>

	@include("layouts.pie")