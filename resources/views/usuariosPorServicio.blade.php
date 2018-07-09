	
@include("layouts.cabecera");
</head>
<body>

@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    
		    <h1 class="typo">Servicios: {{ $serv->nombre_rubro }}</h1>

			<ol>
				@foreach ($pracPers as $pracPer)
					
					
					<h4  class="center-block"><a href="#">{{ $pracPer->nombre }}</a></h4>

				@endforeach
			</ol>

		</div>
	</div>
</div>

<img width="100" src="{{asset('img/practicas/practica1.png')}}" alt="">

@include("layouts.pie")

