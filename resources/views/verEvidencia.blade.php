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
					<h1 class="experiencia-titulo">Práctica: Clases de Guitarra Acustica</h1>
				</div>
				<div class="experiencia-body panel-body">
					<div class="tz-gallery">

				        <div class="row">

				            <div class="col-sm-6 col-md-4">
				                <div class="thumbnail">
				                    <a class="lightbox" href="{{asset('img/practicas/practica1.png')}}">
				                        <img src="{{asset('img/practicas/practica1.png')}}" alt="Park">
				                    </a>
				                </div>
				            </div>
				            <div class="col-sm-6 col-md-4">
				                <div class="thumbnail">
				                    <a class="lightbox" href="{{asset('img/practicas/practica2.png')}}">
				                        <img src="{{asset('img/practicas/practica2.png')}}" alt="Bridge">
				                    </a>
				                </div>
				            </div>
				            <div class="col-sm-6 col-md-4">
				                <div class="thumbnail">
				                    <a class="lightbox" href="{{asset('img/practicas/practica3.png')}}">
				                        <img src="{{asset('img/practicas/practica3.png')}}" alt="Tuneel">
				                    </a>
				                </div>
				            </div>
				        </div>

				    </div>

				   
					<div class="row">

		                <div class="center-block nav-item col-lg-5 col-lg-offset-1"  ><h1>Calificación</h1>
		                	<h4>Como califico el practicante al voluntario</h4>
		                    <div class="form-group"  width="50%" >
		                        <span class="meta-data"><font color="black"><h3>Comentario: <i class="fa fa-star-o"></i> 4</h3></font></span>
		                    </div>
		                    <div class="form-group">
		                    <br>
		                    <h1>Calificación</h1>
		                        <label for="text">Comentario del usuario practicante</label>
		                        <p>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								</p>
		                    </div>
						</div>

		                <div class="center-block nav-item col-lg-5 col-lg-offset-1"  ><h1>Calificación</h1>
		                	<h4>Como califico el voluntario al practicante</h4>
		                    <div class="form-group"  width="50%" >
		                        <span class="meta-data"><font color="black"><h3>Comentario: <i class="fa fa-star-o"></i> 4</h3></font></span>
		                    </div>
		                    <div class="form-group">
		                    <br>
		                    <h1>Calificación</h1>
		                        <label for="text">Comentario del usuario voluntario</label>
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