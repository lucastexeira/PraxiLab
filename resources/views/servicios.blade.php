	
@include("layouts.cabecera");
</head>
<body>

@include("layouts.navbar");
	
<!--<div class="container">
		<div class="row mt centered ">
			<div class="col-lg-12 col-lg-offset-12">
				<h1>Servicios del Rubro: {{ $rubros->nombre_rubro }}</h1>
				<hr>
			</div>
		</div>

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
		</div>
</div>-->


<div class="container">
	<div class="row">
		<div class="col-md-12">
		    
		    <h1 class="typo">Servicios del Rubro: {{ $rubros->nombre_rubro }}</h1>
		    
			<ol>
				@foreach ($servicios as $servicio)

					@if($rubro->id === $servicio->id_rubro)
							<h4  class="center-block"><a href="#">{{ $servicio->nombre_servicio }}</a></h4>
					@endif

				@endforeach
			</ol>

		</div>
	</div>
</div>

@include("layouts.pie")