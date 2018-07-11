@include("layouts.cabecera")
</head>
<body>

	@include("layouts.navbar")

	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item col-lg-6">
				<a class="nav-link text-center active show pestaña" id="historial-tab" data-toggle="tab" href="#historial" role="tab" aria-controls="historial" aria-selected="false">Historia de Transacciones</a>
			</li>
			<li class="nav-item col-lg-6">
				<a class="nav-link text-center pestaña" id="creditos-tab" data-toggle="tab" href="#creditos" role="tab" aria-controls="creditos" aria-selected="true">Créditos</a>
			</li>
		</ul>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade active show" id="historial" role="tabpanel" aria-labelledby="historial-tab">
				
				<div class="card-body">
	                <table class="table table-striped">
	                	<thead>
							<tr>
								<th>Fecha de transacción</th>
								<th>Nombre de la Práctica</th>
								<th>Usuario</th>
								<th>Credito(+)/Debito(-)</th>
								<th>Monto</th>
								<th>Saldo</th>
							</tr>
					    </thead>

					    <tbody>
							<tr>
								<td>20/07/2018</td>
								<td><a href=" {{ 'oferta' }} ">Alisado</a></td>
								<td><a href="#">Laura</a></td>
								<td>Debitado(-)</td>
								<td>-$200</td>
								<td>$690</td>
							</tr>
							<tr>
								<td>08/07/2018</td>
								<td><a href=" {{ 'oferta' }} ">Reparacion de Computadoras</a></td>
								<td><a href="#">Ariel</a></td>
								<td>Acreditado(+)</td>
								<td>+$50</td>
								<td>$890</td>
							</tr>
							<tr>
								<td>04/06/2018</td>
								<td><a href=" {{ 'oferta' }} ">Corte de pelo</a></td>
								<td><a href="#">Matias</a></td>
								<td>Debitado(-)</td>
								<td>-$60</td>
								<td>$840</td>
							</tr>
							<tr>
								<td>03/04/2018</td>
								<td><a href=" {{ 'oferta' }} ">Tintura</td></a>
								<td><a href="#">Florencia</a></td>
								<td>Debitado(-)</td>
								<td>-$100</td>
								<td>$900</td>
							</tr>
							<tr>
								<td>29/03/2018</td>
								<td><a href=" {{ 'oferta' }} ">Compra de Creditos</td></a>
								<td>--</td>
								<td>Agreditado(+)</td>
								<td>$1000</td>
								<td>$1000</td>
							</tr>

					    </tbody>
	                </table>
	            </div>

			</div>

			<div class="tab-pane fade" id="creditos" role="tabpanel" aria-labelledby="creditos-tab">
				<div class="panel panel-default contenido">
					
				</div>
			</div>

		</div>
	</div>
	@include("layouts.pie")