@include("layouts.cabecera")
<link href="css/oferta.css" rel="stylesheet">
</head>
<body>

  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif

	<div class="container">

		<div class="row mt centered ">
			<div class="col-lg-8 col-lg-offset-2">
				<h1>Mis Transacciones</h1>
				<hr>
			</div>
		</div>

		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item col-lg-6">
				<a class="nav-link text-center active show pestaña" id="historial-tab" data-toggle="tab" href="#historial" role="tab" aria-controls="historial" aria-selected="true">Historia de Transacciones</a>
			</li>
			<li class="nav-item col-lg-6">
				<a class="nav-link text-center pestaña" id="creditos-tab" data-toggle="tab" href="#creditos" role="tab" aria-controls="creditos" aria-selected="false">Créditos/Suscripción</a>
			</li>
		</ul>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade active show" id="historial" role="tabpanel" aria-labelledby="historial-tab">
				
				<div class="card-body">
	                <table class="table table-striped">

	                	<br>
	                	<h1>Cantidad de creditos actual: ${{$cantidad}}</h1>
	                	<br>
	                	<thead>
							<tr>
								<th>Fecha de transacción</th>
								<th>Nombre de la Práctica</th>
								<th>Usuario</th>
								<th>Monto</th>
							</tr>
					    </thead>

					    <tbody>

						@foreach($personaTransaccion as $transaccion)
							<tr>
								<td>{{$transaccion->created_at}}</td>

								@if($transaccion->nombre_practica != null)
									<td><a href=" {{ url('oferta/'.$transaccion->id_practica.'' )}} ">{{$transaccion->nombre_practica}}</a></td>
								@else
									<td>Compra de Creditos PraxiLab</td>
								@endif

								@if($transaccion->id_emisor == $transaccion->id_destinatario)

									@foreach($personas as $persona)
										@if($persona->id == $transaccion->id_destinatario)
											<td><a href=" {{ url('perfil/'.$transaccion->id_destinatario.'' )}} ">{{$persona->nombre}}{{$persona->apellido}}</a></td>
										@endif
									@endforeach

									<td>+${{$transaccion->monto_transferido}}</td>

								@elseif($transaccion->id_emisor == $usuario)

									@foreach($personas as $persona)
										@if($persona->id == $transaccion->id_destinatario)
											<td><a href=" {{ url('perfil/'.$transaccion->id_destinatario.'' )}} ">{{$persona->nombre}}{{$persona->apellido}}</a></td>
										@endif
									@endforeach

									<td>-${{$transaccion->monto_transferido}}</td>

								@else
								
									@foreach($personas as $persona)
										@if($persona->id == $transaccion->id_emisor)
											<td><a href=" {{ url('perfil/'.$transaccion->id_destinatario.'' )}} ">{{$persona->nombre}}{{$persona->apellido}}</a></td>
										@endif
									@endforeach

									<td>+${{$transaccion->monto_transferido}}</td>
								@endif


							</tr>
						@endforeach
						<!--<tr>
								<td>08/07/2018</td>
								<td><a href=" {{ 'oferta' }} ">Reparacion de Computadoras</a></td>
								<td><a href="#">Ariel</a></td>
								<td>+$50</td>
								<td>$890</td>
							</tr>
							<tr>
								<td>04/06/2018</td>
								<td><a href=" {{ 'oferta' }} ">Corte de pelo</a></td>
								<td><a href="#">Matias</a></td>
								<td>-$60</td>
								<td>$840</td>
							</tr>
							<tr>
								<td>03/04/2018</td>
								<td><a href=" {{ 'oferta' }} ">Tintura</td></a>
								<td><a href="#">Florencia</a></td>
								<td>-$100</td>
								<td>$900</td>
							</tr>
							<tr>
								<td>29/03/2018</td>
								<td><a href=" {{ 'oferta' }} ">Compra de Creditos</td></a>
								<td>--</td>
								<td>+$1000</td>
								<td>$1000</td>
							</tr>
						-->
					    </tbody>
	                </table>
	            </div>

			</div>

			<div class="tab-pane fade" id="creditos" role="tabpanel" aria-labelledby="creditos-tab">
				<div class="panel panel-default contenido">
					
					<!--<form action=”https://www.paypal.com/cgi-bin/webscr” method=”post”>-->

						<div class="card-body">
							<div class="row">
								<div class="center-block nav-item col-lg-5 col-lg-offset-1"><h1>Creditos</h1>
									<form method="post" action="compra">
									{!! csrf_field()  !!}
										<div class="card-body ">
											<div>
												<div class="form-group">
													<label for="MONTO">Monto</label>
													<input name="monto" id="monto" class="form-control" placeholder="Monto Deseado" type="number"/>
												</div>

												<div class="form-group">
													<label>Precio Total</label>
													<p id = "montoCalculado"></p>
												</div>

												<div class="form-group">
													<p>Cada compra de credito tiene costo de %5</p>
												</div>

											</div>
										</div>
								</div>


				                <div class="center-block nav-item col-lg-5 col-lg-offset-1" ><h1>Suscripción</h1>
				                	<br>
										<div class="form-group"  width="50%" >
											<label for="text">Cantidad de Meses</label>
											<br>
											<select name= "meses">
												@for($i=0;$i<13;$i++)
												<option value="{{$i}}" id= "mes">{{$i}}-${{$i}}00</option>
												@endfor
											</select>
										</div>
										<br>
										<br>
										<div class="form-group">
											<p>La suscripción es de $100 mensuales 
											</p>
										</div>
									
				                </div>

				            </div>
								<div class="center-block">
			                    <h2>Pague con</h2>
			                    <br>
									<div class="nav nav-tabs">
										
											<button class="center-block col-lg-6" style ="width: 20px">
											<img src="{{asset('img/logos/mercadoPago.png')}}"  width="50%" height="85%" class="center-block"/>
											</button>
										
									</div>
								</div>
							</form>
		           		</div>

					<!--</form>-->

				</div>
			</div>

		</div>
	</div>


	<script>
    $( document ).ready(function() {
		$('#monto').on('keyup', function(){
			var monto = parseInt(this.value) + parseInt(this.value)*0.05;
			$('#montoCalculado').html(monto);
		});

	});
    </script>
	@include("layouts.pie")