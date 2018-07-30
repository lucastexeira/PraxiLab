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
						<div>
							<div class="pull-left">
	                			<h1>Cantidad de creditos actual: ${{$cantidad}}</h1>
							</div>
							<div class="pull-right">
								<h1>Cantidad de meses Suscriptro: {{$mes_cantidad}}</h1>
							</div>
						<div>
	                	<br>
						<br>
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
							@if($transaccion->estado != 1 and $transaccion->monto_transferido != 0)
								<tr>
									<td>{{$transaccion->created_at}}</td>

									@if($transaccion->nombre_practica != null)
										<td><a href=" {{ url('oferta/'.$transaccion->id_practica.'' )}} ">{{$transaccion->nombre_practica}}</a></td>
									@else
										<td>Compra de Creditos PraxiLab</td>
									@endif

									@if($transaccion->id_emisor == $transaccion->id_destinatario)

										@foreach($todasPersonas as $per)
											@if($per->id == $transaccion->id_destinatario)
												<td><a href=" {{ url('perfil/'.$transaccion->id_destinatario.'' )}} ">{{$per->nombre}} {{$per->apellido}}</a></td>
											@endif
										@endforeach

										<td>+${{$transaccion->monto_transferido}}</td>

									@elseif($transaccion->id_emisor == $usuario)

										@foreach($todasPersonas as $per)
											@if($per->id == $transaccion->id_destinatario)
												<td><a href=" {{ url('perfil/'.$transaccion->id_destinatario.'' )}} ">{{$per->nombre}} {{$per->apellido}}</a></td>
											@endif
										@endforeach

										<td>-${{$transaccion->monto_transferido}}</td>

									@else
									
										@foreach($todasPersonas as $per)
											@if($per->id == $transaccion->id_emisor)
												<td><a href=" {{ url('perfil/'.$transaccion->id_destinatario.'' )}} ">{{$per->nombre}}{{$per->apellido}}</a></td>
											@endif
										@endforeach

										<td>+${{$transaccion->monto_transferido}}</td>
									@endif


								</tr>
							@endif
						@endforeach
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