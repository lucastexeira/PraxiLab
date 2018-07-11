	
@include("layouts.cabecera");

</head>
<body>

@include("layouts.navbar");
	
<div class="container">
		    
		<h1 class="typo">Servicios: {{ $servicio->nombre_servicio }}</h1>

		<br>
		<div class="row">
					
		@foreach ($pracPers as $pracPer)
			<div class="col-lg-6 col-md-4 col-sm-4">
				<div class="thumbnail img-thumb-bg" style="background-image: url({{asset($pracPer->imagen_practica)}})">
					<div class="overlay"></div>
	                <div class="caption">
	                    <div class="title"><a href="#">{{ $pracPer->nombre_practica }}</a></div>
	                    <div class="clearfix">
	                     	<span class="tag" ><font color="white"><h2>Usuario: <a href="{{url('perfil/')}}">{{ $pracPer->nombre }}</a></h2></font></span>
	                       	<span class="meta-data"><font color="white"><h2>Caificacion: <i class="fa fa-star-o"></i> 5</h2></font></span>
	                   		
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

