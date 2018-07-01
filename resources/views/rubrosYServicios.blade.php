	
@include("layouts.cabecera");
</head>
<body>

@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    <ol class="tree-structure">

			    @foreach ($rubros as $rubro)
			    	<div class="col-md-3 article-img" >
			    		<ul class="list-group" id="list-tab" role="tablist">

							<!--<a href="#" ><img width="75" height="55" src="{{ $rubro->imagen }}" alt="" /><h3>{{ $rubro->nombre_rubro }}</h3></a>-->

							<a data-toggle="modal" class="b-link-fade b-animate-go" href="#myModal"  class="center-block"><img class="center-block" width="75" height="55" src="{{ $rubro->imagen }}" alt="" />
								<h4 class= "text-center">{{ $rubro->nombre_rubro }}</h4>
							</a>
							
								<ol>
									@foreach ($servicios as $servicio)

										@if($rubro->id_rubro === $servicio->id_rubro)
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