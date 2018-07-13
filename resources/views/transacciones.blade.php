@include("layouts.cabecera")
</head>
<body>

@include("layouts.navbar")

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
	                	<h1>Cantidad de creditos actual: $690</h1>
	                	<br>
	                	<thead>
							<tr>
								<th>Fecha de transacción</th>
								<th>Nombre de la Práctica</th>
								<th>Usuario</th>
								<th>Monto</th>
								<th>Saldo</th>
							</tr>
					    </thead>

					    <tbody>
							<tr>
								<td>20/07/2018</td>
								<td><a href=" {{ 'oferta' }} ">Alisado</a></td>
								<td><a href="#">Laura</a></td>
								<td>-$200</td>
								<td>$690</td>
							</tr>
							<tr>
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

					    </tbody>
	                </table>
	            </div>

			</div>

			<div class="tab-pane fade" id="creditos" role="tabpanel" aria-labelledby="creditos-tab">
				<div class="panel panel-default contenido">
					
					<form action=”https://www.paypal.com/cgi-bin/webscr” method=”post”>

						<div class="card-body">

							<div class="row">
				                <div class="center-block nav-item col-lg-5 col-lg-offset-1"  ><h1>Compra de creditos</h1>
				                	<br>
				                    <div class="form-group"  width="50%" >
				                        <label for="text">Cantidad de creditos</label>
				                        <input name="canCredito" type="text" id="canCredito" class="form-control" placeholder="Monto Deseado" required="true" style= "width:60%"/>
				                    </div>
				                    <div class="form-group">
				                        <label for="text">Precio Total</label>
				                        <input name="precioTotal" type="text" id="precioTotal" class="form-control" placeholder="Precio" style= "width:60%"/>
				                    </div>
								</div>

				                <div class="center-block nav-item col-lg-5 col-lg-offset-1" ><h1>Suscripción</h1>
				                	<br>
				                    <div class="form-group"  width="50%" >
				                        <label for="text">Cantidad de Meses</label>
				                        <select>
				                        	@for($i=1;$i<13;$i++)
											<option value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
				                    </div>
				                    <div class="form-group">
				                        <label for="text">Precio Total</label>
				                        <input name="precioTotal" type="text" id="precioTotal" class="form-control" placeholder="Precio" style= "width:40%"/>
				                    </div>
				                </div>

				            </div>

			                    <h2>Pague con</h2>
			                    <br>
			                    <div class="nav nav-tabs">
			                    	<div class="center-block">
					                    <a href="#">
											<img src="{{asset('img/logos/mercadoPago.png')}}"  width="50%" height="85%" class="center-block"/>
										</a>
									</div>
									<div class="center-block">
										<a href="#">
											<img src="{{asset('img/logos/paypal.png')}}"  width="60%" height="65%" class="center-block"/>
										</a>
									</div>
								</div>
		           		</div>

					</form>

				</div>
			</div>

		</div>
	</div>
	@include("layouts.pie")