	
	@include("layouts.cabecera")
	<link href="css/estilosLogin.css" rel="stylesheet">
</head>
<body>

	@include("layouts.navbar")
	</br>
	<div class="container">
		<div class="col-md-12">
	    	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	        <div class="well">
	            <div class="card-header">
	                    <h1 class="text-center">Mi listado de Prácticas</h1>
	            </div>
	            <div class="card-body">
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
					        <td>En Curso</td>
					      </tr>
					      <tr>
					        <td>Matias - matiash@gmail.com - 444433333</td>
					        <td><a href=" {{ 'oferta' }} ">Corte de pelo</a></td>
					        <td>$60</td>
					        <td>04/06/2018</td>
					        <td>Finalizado</td>
					        <td><button type="success">Falta Calificar</button></td>
					      </tr>
					      <tr>
					        <td>Ariel - arielgabrielr@gmail.com - 44447777</td>
					        <td><a href=" {{ 'oferta' }} ">Alisado</a></td>
					        <td>$60</td>
					        <td>08/06/2018</td>
					        <td>Finalizado</td>
					      </tr>
					    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</div>
<footer>
@include("layouts.pie")