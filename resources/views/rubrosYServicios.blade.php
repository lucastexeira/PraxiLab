	
	@include("layouts.cabecera");
</head>
<body>

	@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    <ol class="tree-structure">

			    @foreach ($rubros as $rubro)
			    	<div class="col-md-4 article-img" >
			    		<ul class="list-group">
			    			
							<h3><a class="num" href="#">{{ $rubro->nombre_rubro }} </a></h3>
							
								<ol>
									@foreach ($servicios as $servicio)

										@if($rubro->id_rubro === $servicio->id_rubro)
											<li>
												<span class="num">*</span>
												<h4><a href="#" class="text-left">{{ $servicio->nombre_servicio }}</a></h4>
											</li>
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