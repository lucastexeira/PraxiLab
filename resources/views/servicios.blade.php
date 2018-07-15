	
@include("layouts.cabecera");
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif

<div class="container">
	<div class="row">
		<div class="col-md-12">
		    
		    <div class="row mt centered ">
				<div class="center-block">
					<h1>Rubros: {{ $ruId->nombre_rubro }}</h1>
					<hr>
				</div>
			</div>

		    <h3 class="typo">	Servicios</h3>
			<ol>
				@foreach ($servicios as $servicio)

					@if($ruId->id === $servicio->id_rubro)
							<h4  class="center-block"><a href="{{url('usuariosPorServicio/'.$servicio->id.'')}}" style="color: #6200A6">{{ $servicio->nombre_servicio }}</a></h4>
					@endif

				@endforeach
			</ol>

		</div>
	</div>
</div>
<footer>
@include("layouts.pie")