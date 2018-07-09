	
@include("layouts.cabecera");

</head>
<body>

@include("layouts.navbar");
	
<div class="container">
		    
		    <h1 class="typo">Servicios: {{ $servicio->nombre_servicio }}</h1>

		    <br>
				<div class="row">
						<div class="col-lg-6 col-md-4 col-sm-4">
				@foreach ($pracPers as $pracPer)
					
							<div class="thumbnail img-thumb-bg" style="background-image: url({{asset($pracPer->imagen_practica)}})">
				               <div class="overlay"></div>
				               <div class="caption">
				                   <div class="title"><a href="#">{{ $pracPer->nombre_practica }}</a></div>
				                   <div class="clearfix">
				                    	<span class="tag" ><h2 ><font color="white">Usuario: <a href="{{url('perfil/')}}">{{ $pracPer->nombre }}</a>
				                       		<span class="meta-data"><h2><font color="white"><p>  </p>Caificacion: <i class="fa fa-star-o"></i> 5</h2></span>
				                   		</h2></span>
				                   </div>
				                   <div class="content">
				                       <p>{{ $pracPer->descripcion }}</p>
				                   </div>
				               </div>
				            </div>
				@endforeach
				        </div>
					</div>
				
</div>


@include("layouts.pie")

