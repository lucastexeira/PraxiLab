@include("layouts.cabecera")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<link rel="stylesheet" href="gallery-clean.css">
<link href="{{asset('css/oferta.css')}}" rel="stylesheet">
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

						<div class="col-lg-8 col-md-4 center-block">
							<div class="thumbnail">
								<a class="lightbox" href="{{asset($imagenEvidencia)}}">
									<img src="{{asset($imagenEvidencia)}}" alt="Park" >
								</a>
							</div>
						</div>

					</div>

				</div>

				
				<div class="row">

					<div class="center-block nav-item col-lg-5 col-lg-offset-1">
						<h1>Usuario Practicante: {{$comentarioPracticante->nombre}} {{$comentarioPracticante->apellido}}</h1>
						
						<div>
							<div class="container contenido">
								<span class="heading">Fue calificado con:</span>

								@if($practicanteCalificado == 1)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								@elseif($practicanteCalificado == 2)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								@elseif($practicanteCalificado == 3)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								@elseif($practicanteCalificado == 4)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
								@elseif($practicanteCalificado == 5)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
								@endif

							</div>
						</div>	

						<div class="form-group">
							<br>
							<h1>Comentario</h1>
							<p>{{$comentarioPracticante->comentario}}</p>
						</div>
					</div>

					<div class="center-block nav-item col-lg-5 col-lg-offset-1">
						<h1>Usuario voluntario: {{$comentarioVoluntario->nombre}} {{$comentarioVoluntario->apellido}}</h1>

						<div>
							<div class="container contenido">
								<span class="heading">Fue calificado con:</span>

								@if($voluntarioCalificado == 1)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								@elseif($voluntarioCalificado == 2)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								@elseif($voluntarioCalificado == 3)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								@elseif($voluntarioCalificado == 4)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star"></span>
								@elseif($voluntarioCalificado == 5)
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
									<span class="fa fa-star checked-purple"></span>
								@endif

							</div>
						</div>	

						<div class="form-group">
							<br>
							<h1>Comentario</h1>
							<p>{{$comentarioVoluntario->comentario}}</p>
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