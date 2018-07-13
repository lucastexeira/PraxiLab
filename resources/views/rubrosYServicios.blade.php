	
@include("layouts.cabecera");
</head>
<body>

@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    <ol class="tree-structure">
		    	<div class="row mt centered ">
			      <div class="col-lg-8 col-lg-offset-2">
			        <h1>Rubros</h1>
			        <hr>
			      </div>
			    </div>
			    @foreach ($rubros as $rubro)
			    	<div class="col-md-3 article-img">
			    		
			    		<ul class="list-group" id="list-tab" role="tablist">
							<div  class="center-block">
							<br>
							<br>
							<a class="b-link-fade b-animate-go"  class="mask flex-center rgba-blue-light" href="servicios/{{ $rubro->id }}"><img class="center-block" width="75" height="55" src="{{ $rubro->imagen }}" />
								<h2 class= "text-center">{{ $rubro->nombre_rubro }}</h2>
							</a>
								@foreach ($servicios as $servicio)

									@if($rubro->id === $servicio->id_rubro)
											<h4><a href="usuariosPorServicio/{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</a></h4>
									@endif

								@endforeach
							</div>
						</ul>
					</div>
				@endforeach

			</ol>
		</div>
	</div>
</div>
<footer>
@include("layouts.pie")