	
	@include("layouts.cabecera")
</head>
<body>

	@include("layouts.navbar");
	
<div class="container">
		<div class="row mt centered ">
			<div class="col-lg-12 col-lg-offset-12">
				<h1>Servicios del Rubro: {{ $rubros->nombre_rubro }}</h1>
				<hr>
			</div>
		</div><!-- /row -->

		<div class="row mt">
			@foreach ($serviciosPorRubro as $servicio)
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" height="250" src="{{ $servicio->imagen }}" alt="{{ $servicio->nombre_servicio }}" />
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

@include("layouts.pie")