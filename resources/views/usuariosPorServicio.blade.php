	
@include("layouts.cabecera");

<!--Estilo de la lista de practicas-->
<link href="{{asset('css/usuariosPorServicio.css')}}" rel="stylesheet">

</head>
<body>

@include("layouts.navbar");
	
<div class="container">
		    
		<div class="row mt centered ">
			<div class="col-lg-8 col-lg-offset-2">
				<h1>Servicios: {{ $servicio->nombre_servicio }}</h1>
				<hr>
			</div>
		</div>
	<div class="row">
					
		@foreach ($pracPers as $pracPer)
			<div class="col-lg-6 col-md-4 col-sm-4">
				<div class="thumbnail img-thumb-bg" style="background-image: url({{asset($pracPer->imagen_practica)}})">
					<div class="overlay"></div>
	                <div class="caption">
	                    <div class="tag"><a href="{{url('oferta/')}}">{{ $pracPer->nombre_practica }}</a></div>
	                    <div class="clearfix">
	                     	<span class="tag" ><font color="white"><h2>Usuario: <a href="{{url('perfil/')}}">{{ $pracPer->nombre }}</a></h2></font></span>
                       		<span class="meta-data"><font color="white"><h2>Calificación: <i class="fa fa-star-o"></i> 5     Oferta: <i class="fa fa-dollar"></i> 50</h2></font></span>
                       		<span class="meta-data"><font color="white"></font></span>
	                    </div>
	                    <div class="content">
	                       <p>{{ $pracPer->descripcion }}</p>
	                    </div>
	                </div>
	            </div>

			</div>
		@endforeach
			       
	</div>
				
</div>
<footer>

@include("layouts.pie")

