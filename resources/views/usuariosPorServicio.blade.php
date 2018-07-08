	
@include("layouts.cabecera");
</head>
<body>

@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    
		    <h1 class="typo">Servicios: {{ $rubros->nombre_rubro }}</h1>

			<ol>
				@foreach ($servicios as $servicio)

					@if($rubro->id === $servicio->id_rubro)
							<h4  class="center-block"><a href="usuariosPorServicio/{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</a></h4>
					@endif

				@endforeach
			</ol>

		</div>
	</div>
</div>
<footer>

@include("layouts.pie")