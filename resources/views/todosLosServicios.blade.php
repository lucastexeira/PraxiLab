
	@include("layouts.cabecera")
</head>
<body>

	@include("layouts.navbar");
	
	<div class="container">
		<div class="row mt centered ">
			<div class="col-lg-4 col-lg-offset-4">
				<h1>Todas las Prácticas</h1>
				<hr>
			</div>
		</div><!-- /row -->

		<div class="row mt ">

			<form class="col-lg-4" action="{{ 'todosLosServicios' }}" method="GET"> 
		      <span><i class="nav-icon-search"></i></span><input class="form-control" type="search" placeholder="Nombre de la practica" aria-label="Search" id="buscador" name="buscador" >
		      <!--button type="button" class="btn btn-cta btn-lg" style="background-color: #9244a4">Buscar</button-->
		    </form>

		  <div class="col-lg-4">
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>Seleccionar Rubro</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		    </select>
		  </div>
	    </div>

		<div class="row">

			@foreach ($buscador as $servicio)
			<div class="col-lg-3 col-md-3 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="250" height="180" src="{{ $servicio->imagen }}" alt="{{ $servicio->nombre_servicio }}" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Ver más</h4>
					</div>
				</a>
				<p>{{ $servicio->nombre_servicio }}</p>
				<hr-d>
			</div>
			@endforeach
		</div><!-- /row -->
	</div>
<footer>
@include("layouts.pie")

