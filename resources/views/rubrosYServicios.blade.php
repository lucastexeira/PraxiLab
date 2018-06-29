	
	@include("layouts.cabecera");
</head>
<body>

	@include("layouts.navbar");
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
		    <ol class="tree-structure">
			    @foreach ($rubros as $rubro)
	              <li>
	                 <span class="num">{{ $rubro->id_rubro }}</span>
	                 <a href="#">{{ $rubro->nombre_rubro }} </a>
	                 <ol>
	                 	@foreach ($servicios as $servicio)
		                    <li>
		                       <span class="num">{{ $rubro->id_rubro }}.{{ $servicio->id_servicio }}</span>
		                       <a href="#">{{ $servicio->nombre_servicio }}</a>
		                    </li>
	                    @endforeach
	                 </ol>
	              </li>
	            @endforeach
           </ol>
		</div>
	</div>
</div>

@include("layouts.pie")