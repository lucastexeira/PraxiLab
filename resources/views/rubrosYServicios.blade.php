	
@include("layouts.cabecera");
</head>
<body>

@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    <ol class="tree-structure">
		    	<h1 class="typo">Rubros</h1>
			    @foreach ($rubros as $rubro)
			    	<div class="col-md-3 article-img">
			    		<ul class="list-group" id="list-tab" role="tablist">

							<!--<a href="#" ><img width="75" height="55" src="{{ $rubro->imagen }}" alt="" /><h3>{{ $rubro->nombre_rubro }}</h3></a>-->
							<div  class="center-block">
							<a class="b-link-fade b-animate-go"  class="mask flex-center rgba-blue-light" href="servicios/{{ $rubro->id }}"><img class="center-block" width="75" height="55" src="{{ $rubro->imagen }}" />
								<h4 class= "text-center">{{ $rubro->nombre_rubro }}</h4>
							</a>
							</div>
								<ol>
									@foreach ($servicios as $servicio)

										@if($rubro->id === $servicio->id_rubro)
												<h4  class="center-block"><a href="#">{{ $servicio->nombre_servicio }}</a></h4>
										@endif

									@endforeach
								</ol>

						</ul>
					</div>
				@endforeach

			</ol>
		</div>
	</div>
</div>

@include("layouts.pie")