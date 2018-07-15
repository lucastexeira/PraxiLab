	
	@include("layouts.cabecera")
	<link href="css/estilosLogin.css" rel="stylesheet">

</head>
<body>
  @if(session()->has('mail'))
    @include('layouts.navbar')
  @else 
      @include('layouts.navbarSinInicio')
  @endif
	</br>

	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item col-lg-3">
				<a class="nav-link text-center active show pestaña" id="ofertas-tab" data-toggle="tab" href="#ofertas" role="tab" aria-controls="ofertas" aria-selected="false">Como Practicante</a>
			</li>
			<li class="nav-item col-lg-3">
				<a class="nav-link text-center pestaña" id="experiencia-tab" data-toggle="tab" href="#experiencia" role="tab" aria-controls="experiencia" aria-selected="true">Como Voluntario</a>
			</li>
		</ul>
		
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade active show" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">
				<div class="panel panel-default contenido">
					<div class="panel-body">
						<div class="card-header">
	                    	<h1 class="text-center">Mi listado de Prácticas</h1>
	            		</div>

	            		</br>
	            		<div class="col-lg-4">
		            		<select class="form-control" id="select">
					          <option value="">Seleccionar Estado</option>
					            <option value="">Solicitada</option>
					            <option value="">En Curso</option>
					            <option value="">Finalizada</option>
					            <option value="">Sin Calificar</option>
					        </select>

				        </div>
				        </br>

						<table class="table table-striped">
		                	<thead>
						      <tr>
						        <th>Usuario</th>
						        <th>Nombre de la Práctica</th>
						        <th>Precio</th>
						        <th>Fecha de solicitud</th>
						        <th>Estado</th>
						      </tr>
						    </thead>

						    <tbody>
						      <tr>
						        <td>Florencia - florc@gmail.com - 44448888</td>
						        <td><a href=" {{ 'oferta' }} ">Tintura</td></a>
						        <td>$60</td>
						        <td>03/04/2018</td>
						        <td>Solicitada</td>
						        <td><a href="#"><button type="button" class="btn btn-success btn-lg" >Comenzar</button></a></td>
						      </tr>
						      <tr>
						        <td>Florencia - florc@gmail.com - 44448888</td>
						        <td><a href=" {{ 'oferta' }} ">Tintura</td></a>
						        <td>$80</td>
						        <td>03/04/2018</td>
						        <td>En Curso</td>
						        <td><a href="#"><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Terminar</button></a></td>
						      </tr>

							<!-- Modal -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							      </div>
							      <div class="modal-body">
							        ¿Está seguro que desea finalizar la práctica?
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
							        <a href="{{ 'listadoPracticasEstados' }}">
							        	<button type="button" class="btn btn-primary">Continuar</button>
							        </a>
							      </div>
							    </div>
							  </div>
							</div>


						      <tr>
						        <td>Matias - matiash@gmail.com - 444433333</td>
						        <td><a href=" {{ 'oferta' }} ">Corte de pelo</a></td>
						        <td>$60</td>
						        <td>04/06/2018</td>
						        <td>Sin Calificar</td>
						        <td><a href=" {{ 'cargarEvidencia' }} "><button type="button" class="btn btn-warning btn-lg" >Evidenciar/Calificar</button></a></td>
						      </tr>
						      <tr>
						        <td>Ariel - arielgabrielr@gmail.com - 44447777</td>
						        <td><a href=" {{ 'oferta' }} ">Alisado</a></td>
						        <td>$200</td>
						        <td>08/06/2018</td>
						        <td>Finalizado</td>
						        <td>&nbsp</td>
						      </tr>
						    </tbody>
	                	</table>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
				<div class="panel panel-default contenido">
					<div class="panel-body">
						<div class="card-header">
	                    	<h1 class="text-center">Mi listado de Prácticas</h1>
	            		</div>

	            		</br>
	            		<div class="col-lg-4">
		            		<select class="form-control" id="select">
					          <option value="">Seleccionar Estado</option>
					            <option value="">Solicitada</option>
					            <option value="">En Curso</option>
					            <option value="">Finalizada</option>
					            <option value="">Sin Calificar</option>
					        </select>

				        </div>
				        </br>

						<table class="table table-striped">
		                	<thead>
						      <tr>
						        <th>Usuario</th>
						        <th>Nombre de la Práctica</th>
						        <th>Precio</th>
						        <th>Fecha de solicitud</th>
						        <th>Estado</th>
						      </tr>
						    </thead>

						    <tbody>
						      <tr>
						        <td>Florencia - florc@gmail.com - 44448888</td>
						        <td><a href=" {{ 'oferta' }} ">Tintura</td></a>
						        <td>$60</td>
						        <td>03/04/2018</td>
						        <td>Solicitada</td>
						        <td>&nbsp</td>
						      </tr>
						      <tr>
						        <td>Florencia - florc@gmail.com - 44448888</td>
						        <td><a href=" {{ 'oferta' }} ">Tintura</td></a>
						        <td>$150</td>
						        <td>03/04/2018</td>
						        <td>En Curso</td>
						        <td>&nbsp</td>
						      </tr>
						      <tr>
						        <td>Matias - matiash@gmail.com - 444433333</td>
						        <td><a href=" {{ 'oferta' }} ">Corte de pelo</a></td>
						        <td>$60</td>
						        <td>04/06/2018</td>
						        <td>Sin Calificar</td>
						        <td><a href=" {{ 'cargarEvidencia' }} "><button type="button" class="btn btn-warning btn-lg" >Evidenciar/Calificar</button></a></td>
						      </tr>
						      <tr>
						        <td>Ariel - arielgabrielr@gmail.com - 44447777</td>
						        <td><a href=" {{ 'oferta' }} ">Alisado</a></td>
						        <td>$250</td>
						        <td>08/06/2018</td>
						        <td>Finalizado</td>
						        <td>&nbsp</td>
						      </tr>
						    </tbody>
	                	</table>
					</div>
				</div>
			</div>
		</div>
	</div>	

@include("layouts.pie")